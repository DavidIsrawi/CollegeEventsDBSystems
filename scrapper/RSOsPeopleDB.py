import json
import requests, time

request = requests.Session()

# JSON of RSOs
with open('RSOs.json') as data:
    RSOs = json.load(data)

rsoL = list()
userL = list()

class RSO:
    def __init__(self, name, description, image, userid):
        self.name = name
        self.description = description
        self.image = image
        self.userid = userid

class user:
    def __init__(self, name, password, email, userid):
        self.name = name
        self.password = password
        self.email = email
        self.userid = userid

counter = 3000
for club in RSOs:
    password = club["owner"][0] + "123456" + club["owner"][-1]
    email = club["owner"].replace(" ", "") + "@knights.ucf.edu"

    rsoL.append(RSO(club["name"], club["description"], club["image"], counter))
    userL.append(user(club["owner"], password, email, counter))

    counter += 1

for i in range(1, len(rsoL)):
    print("-- RSO --")
    print("Name: ",rsoL[i].name)
    print("Description: ",rsoL[i].description)
    print("Image: ",rsoL[i].image)
    print("userid: ",rsoL[i].userid)
    print()

    print("-- User --")
    print("Name: ",userL[i].name)
    print("Password: ",userL[i].password)
    print("Email: ",userL[i].email)
    print("userid: ",userL[i].userid)
    print()

    payload = {
        'user_id':userL[i].userid,
        'password':userL[i].password,
        'name':userL[i].name,
        's_email':userL[i].email
    }

    response = request.post('http://teamflightclubproject.com/php/createAccountDB.php',data=payload)
    print(response.content)

    payload = {
        'user_id':rsoL[i].userid,
        'name':rsoL[i].name,
        'logo':rsoL[i].image,
        'description':rsoL[i].description
    }
    response = request.post('http://teamflightclubproject.com/php/createRSO.php',data=payload)
    print(response.content)
    print()
