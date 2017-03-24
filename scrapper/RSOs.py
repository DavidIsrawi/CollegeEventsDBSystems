import requests
from bs4 import BeautifulSoup
import feedparser
import json

rsoLst = list()

class RSO:
    def __init__(self, name, description, image, owner):
        self.name = name
        self.description = description
        self.image = image
        self.owner = owner

for i in range(1,67):
    # Request page
    fPage = "https://ucf.collegiatelink.net/organizations?SearchType=None&SelectedCategoryId=0&CurrentPage=" + str(i)
    result = requests.get(fPage)

    # Get content from website
    content = result.content

    # Beautify
    soup = BeautifulSoup(content)

    rsos = soup.find_all("div", "result clearfix")
    for rso in rsos:

        profile = rso.find("h5").find("a").get("href")
        # Request page
        profilePage = "https://ucf.collegiatelink.net" + profile
        profileResult = requests.get(profilePage)
        profileContent = profileResult.content
        soupP = BeautifulSoup(profileContent)
        owner = soupP.find("div", "container-orgcontact").findAll("li")[1].text[18:].strip()

        name = rso.find("a").next
        description = rso.find("p").next

        if rso.find("img") is not None:
            picture = rso.find("img").get('src')
        else:
            picture = ""

        print("\n\n\nClub Information:")
        print(name)
        print(description)
        print(picture)
        print(owner)
        rsoLst.append(RSO(name,description,picture,owner))

with open('RSOs.json', 'w') as outfile:
    json.dump(rsoLst, outfile, default=lambda o: o.__dict__, indent=4)
