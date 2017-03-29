import requests
from bs4 import BeautifulSoup
import feedparser
import json
import re

for month in range (3,6):
    for day  in range (1,31):
        page = "http://events.ucf.edu/2017/" + str(month) + "/" + str(day) + "/feed.xml"
        result = requests.get(page)
        content = result.content
        soup = BeautifulSoup(content, 'xml')

        events = soup.findAll('event')
        for event in events:
            print("\n\n\n\n Event:")
            location = event.find('location').next + " University of Central Florida"
            print(location)

            url = 'https://maps.googleapis.com/maps/api/geocode/json'
            query = {
                'address':location,
                'key':'AIzaSyB0CgY-lHlXYj4WX2ETtnka4-iUwjq88zc'
            }
            request = requests.Session()
            response = request.get(url,params=query)
            info = response.json()
            latitude = info["results"][0]['geometry']['location']['lat']
            longitude = info["results"][0]['geometry']['location']['lng']
            print(info["results"][0]['geometry']['location']['lat'])
