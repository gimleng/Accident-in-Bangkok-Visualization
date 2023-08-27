import pandas as pd
import geojson
from shapely.geometry import shape, Point
import codecs

with codecs.open('data/Bangkok-districts.geojson', encoding = 'utf-8') as f:
    js = geojson.load(f)

data_list = list()
df = pd.read_csv('data/bkk-accident-itic-2022-2020.csv', encoding='utf-8')

point_data_list = list()
for i in range(len(df)):
    point_data_list.append([df['latitude'][i],df['longitude'][i], df['start'][i]])

district_point_group = dict()
for feature in js['features']:
    polygon = shape(feature['geometry'])
    for i in range(len(point_data_list)):
        point = Point(point_data_list[i][1], point_data_list[i][0])
        point_label = str(point_data_list[i][1]) + ',' + str(point_data_list[i][0])
        event_date = point_data_list[i][2]
        event_date_day = event_date.split(' ')[0].split('-')[1]
        if polygon.contains(point):
            # print('Found containing polygon:', feature['properties']['dname'])
            if feature['properties']['dname'] in district_point_group:
                district_point_group[feature['properties']['dname']] += [[point_label, event_date_day]]
            else:
                district_point_group[feature['properties']['dname']] = []
                district_point_group[feature['properties']['dname']] += [[point_label, event_date_day]]

# number of all accident points in 2020-2022
for i in district_point_group:
    print(i, len(district_point_group[i]))

# show accident number for each month
district_accident_month = list()
for i in district_point_group:
    for j in range(len(district_point_group[i])):
        district_accident_month.append(i+str(district_point_group[i][j][1]))
        
result_dict = dict()
for i in district_accident_month:
    result_dict[i] = district_accident_month.count(i)
    
print(result_dict)

