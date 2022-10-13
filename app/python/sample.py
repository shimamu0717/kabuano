import pandas_datareader.data as web
import datetime

start = datetime.date(2010,1,1)
end = datetime.date.today()

df = web.DataReader('9984.T', 'yahoo', start, end)
result=df.head()

print(result)
