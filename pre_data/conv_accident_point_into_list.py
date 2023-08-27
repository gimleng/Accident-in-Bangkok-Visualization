import pandas as pd

data_list = list()
df = pd.read_csv('data/bkk-accident-itic-2022-2020.csv', encoding='utf-8')

file = open('result/accident_point_list.txt','w')
for i in range(len(df)):
    print('[', df['eid'][i],',' ,df['latitude'][i],',',df['longitude'][i] ,']',',','\n')
    text = str('['+ str(df['eid'][i])+',' +str(df['latitude'][i])+','+str(df['longitude'][i]) + ',' +'"' + str(df['start'][i])+'"' +']' +','+'\n')
    file.write(text)
file.close()