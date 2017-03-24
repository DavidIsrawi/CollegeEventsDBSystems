import requests
from bs4 import BeautifulSoup
import feedparser
import json

rsoLst = list()

class RSO:
    def __init__(self, name, description, image):
        self.name = name
        self.description = description
        self.image = image


# Request page
fPage = "https://ucf.collegiatelink.net/organizations"
result = requests.get(fPage)

# Get content from website
content = result.content

# Beautify
soup = BeautifulSoup(content)

rsos = soup.find_all("div", "result clearfix")
for rso in rsos:
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
    rsoLst.append(RSO(name,description,picture))

with open('RSOs.json', 'w') as outfile:
    json.dump(rsoLst, outfile, default=lambda o: o.__dict__, indent=4)
