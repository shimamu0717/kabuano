import sys
import pandas_datareader.data as web

code = sys.argv[1]+'.T'
start_date = sys.argv[2]
start_open_or_close = sys.argv[3]
end_date = sys.argv[4]
end_open_or_close = sys.argv[5]

df = web.DataReader(code, 'yahoo', start_date, end_date)

start_price = df.at[start_date,start_open_or_close]
end_price = df.at[end_date,end_open_or_close]
yield_price = end_price - start_price
yield_ratio = round(yield_price/start_price*100,1)
high = df['High'].max()
low = df['Low'].min()
print(start_price)
print(end_price)
print('{:+}'.format(yield_price))
print('{:+}'.format(yield_ratio))
print(high)
print(low)
