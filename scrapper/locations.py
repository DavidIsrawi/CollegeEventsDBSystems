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
            print("\n\n\n\nEvent:")
            location = event.find('location').next
            print(location)

            url = 'https://maps.googleapis.com/maps/api/geocode/json'
            query = {
                'address':location,
                'key':'AIzaSyB0CgY-lHlXYj4WX2ETtnka4-iUwjq88zc'
            }
            print("month: " + str(month))
            print("day: " + str(day))
            request = requests.Session()
            response = request.get(url,params=query)
            info = response.json()
            print((len(info['results'])))
            # print(info['results']['status'])
            if(len(info['results']) < 1):
                latitude = 28.602011
                longitude = -81.200829
            else:
                latitude = info["results"][0]['geometry']['location']['lat']
                longitude = info["results"][0]['geometry']['location']['lng']

            if not (latitude < 29.00 and latitude > 28.00 and longitude > -83.00 and longitude < -81.00):
                print("Setting Student Union coordinates")
                latitude = 28.602011
                longitude = -81.200829

            print(latitude)
            print(longitude)

            payload = {
                'location_name':location,
                'latitude':latitude,
                'longitude':longitude
            }

            response = request.post('http://teamflightclubproject.com/php/createLocation.php',data=payload)
            print(response.content)

