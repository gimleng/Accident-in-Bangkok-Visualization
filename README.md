# :car: Accident in Bangkok Visualization
## :green_circle: Description
This project shows data in various ways and offers time option to show data at that time 

## :green_circle: Data
- Main Source: https://data.bangkok.go.th/dataset/100-risk-map
  - Direct link: https://raw.githubusercontent.com/MetamediaTechnology/bangkok-accidents-data/main/2022-06/bkk-accident-itic-2022-2020.csv
 
- Data header:
  - eid, title, title_en, description, description_en, latitude, longitude, type, start, stop, contributor
  - Example:
    - eid: 645529
    - title: อุบัติเหตุ ปากซอยจรัญสนิทวงศ์ 95/1 (ซอยมิตรพัฒนา)
    - title_en: Accident at Charan Sanitwong 95/1 (Soi Mitphatthana)
    - description: 04:59 ถนนจรัญสนิทวงศ์ ที่ปากซอยจรัญสนิทวงศ์ 95/1 รถเก๋งชนคน มีผู้บาดเจ็บหญิง 1 คน ช่องทางซ้าย จนท.กำลังดำเนินการ Cr.JS 100
    - description_en: Car accident blocking the left lane at the entrance of Soi Charan Sanitwong 95/1 (Soi Mitphatthana).Cr.JS 100
    - latitude: 13.803559198631
    - longitude: 100.51184669137
    - type: 3
    - start: 2020-01-01 05:27:26
    - stop: 2020-01-01 06:27:26
    - contributor: itic.nirat
   
## :green_circle: Data Processing
From the example data, there is no column that indicates where district the accident occurred. so I have to use latitude and longitude value to identify district in bangkok district geometry (which stored in geojson format)

- Bangkok district geojson format: https://github.com/pcrete/gsvloader-demo/blob/master/geojson/Bangkok-districts.geojson
- My python code for identify district where accident occured: [group_data_by_district_with_year.py](https://github.com/gimleng/Accident-in-Bangkok-Visualization/blob/main/pre_data/group_data_by_district_with_year.py)
  - Result: [bkk_district_year.json](https://github.com/gimleng/Accident-in-Bangkok-Visualization/blob/main/pre_data/result/bkk_district_year.json)

## :green_circle: Visualization
I decided to use a website to visualize data

- Demo: https://gimleng.github.io/bangkokaccident

## :game_die: Feature
- Crustering data point, depend on zoom scale
  ![Crustering](https://drive.google.com/uc?id=17I6MQBCpJuzFLOoiSv6sy-lZNDEFfvcf)

- Show data based on time interval
  ![time interval](https://drive.google.com/uc?id=1NPj2Pfs6I2cRWlm3qMdEswoQX6w7GqTD)

- Show district information from selected area
  ![district information](https://drive.google.com/uc?id=1c_st_6V0KIDemmzFXDScYJjMKxSeCcSJ)

- Display a table and bar chart for the chosen location. Additionally, there are 3 buttons to adjust the yearly data interval
  ![district information](https://drive.google.com/uc?id=1jnkF3AgCtaZsL_aqRIUT3XmbSsoUlzt_)
