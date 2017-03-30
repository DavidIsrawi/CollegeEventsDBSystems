import json
import requests, time

request = requests.Session()

def makeTwo(number):
    if len(str(number)) == 1:
        return '0'+str(number)
    else:
        return number

# JSON of RSOs
with open('events.json') as data:
    events = json.load(data)

eventType = ['Social', 'Fundraising', 'Tech Talks', 'Sports', 'Health', 'SGA', 'Politics', 'Finances']
month = {'Mar':'03', 'Apr':'04', 'May':'05'}
counter = 0

for event in events[1:]:

    startD = event["date"].split(" ")
    endD = event["dateEnd"].split(" ")

    startDay = makeTwo(startD[1])
    startMonth = month[startD[2]]
    startYear = startD[3]
    endDay = makeTwo(endD[1])
    endMonth = month[endD[2]]
    endYear = endD[3]

    print("-- Event --")
    print("Title: ", event["title"])
    print("Description: ", event["description"])
    print("Location: ", event["location"])
    print("Tags: ", event["tags"])
    print("eid: ", event["eid"])
    print("Type: ", eventType[counter%len(eventType)])
    print("Contact Name: ", event["owner"])
    print("Contact Email: ", event["email"])
    print("Start date: |", event["date"][0:-1], "|")
    print("End date: |", event["dateEnd"][0:-1], "|")
    print()

    payload = {
        'name':event["title"].replace("'",""),
        'description':event["description"].replace("'",""),
        'location_name':event["location"].replace("'",""),
        'tags':event["tags"],
        'event_id':event["eid"],
        'category':'Public',
        'type':eventType[counter%len(eventType)],
        'start_date':event["date"][0:-1],
        'end_date':event["dateEnd"][0:-1],
        'contact_name':event["owner"],
        'contact_email':event["email"],
        'status': "Approved",
        'user_id': 161215
    }

    response = request.post('http://teamflightclubproject.com/php/createEvent.php',data=payload)
    print(response.content)

    print()
    counter += 1
