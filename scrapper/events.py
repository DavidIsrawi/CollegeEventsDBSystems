import requests
from bs4 import BeautifulSoup
import feedparser
import json
import re

# Implement feeds per day (http://events.ucf.edu/2017/3/25/feed.xml)

eventL = list()

class eventC:
    def __init__(self, title, eid, location, date, dateEnd, description, owner, email, tags):
        self.title = title
        self.eid = eid
        self.location = location
        self.date = date
        self.dateEnd = dateEnd
        self.description = description
        self.owner = owner
        self.email = email
        self.tags = tags

for month in range (3,6):
    for day in range(1,31):
        page = "http://events.ucf.edu/2017/" + str(month) + "/" + str(day) + "/feed.xml"
        result = requests.get(page)
        # Get content from website
        content = result.content
        # Beautify
        soup = BeautifulSoup(content, 'xml')

        events = soup.findAll('event')
        for event in events:
            print("\n\n\n\n Event:")
            title = event.find('title').next
            eid = event.find('event_id').next
            location = event.find('location').next
            date = event.find('start_date').next[:-5]
            dateEnd = event.find('end_date').next[:-5]
            owner = event.find('contact_person').next
            email = event.find('contact_email').next
            tags = event.findAll('tag')
            tagsL = list()
            for tag in tags:
                tagsL.append(tag.next)
            description = event.find('description').next
            description = re.sub('<[^>]+>', '', description)
            print("Title: ", title)
            print("id: ", eid)
            print("Location: ", location)
            print("Date: ", date)
            print("Date End: ", dateEnd)
            print("Owner: ", owner)
            print("Email: ", email)
            print("Tags: ", tagsL)
            print("Description: ", description)
            description = description.replace("\u00a0", "").replace("\u201c", "").replace("\u2026", "").replace("\u201d", "").replace("\u2019", "'")
            eventL.append(eventC(title,eid,location,date,dateEnd,description,owner,email,tagsL))

with open('events.json', 'w') as outfile:
    json.dump(eventL, outfile, default=lambda o: o.__dict__, indent=4)
