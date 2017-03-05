import os


resolutions = [
	['640','1136'], # iPhone SE & iPhone 5 
	['750','1334'], # iPhone 7 
	['1242','2208'], # iPhone 7 plus
	['1536','2048'], # iPad Mini
	['1536','2048'], # iPad Air
	['2048','2732'], # iPad Pro
	['1366','768'], # 14" laptop
	['1920','1080'], #21.5'' monitor / 23'' monitor / 1080p TV
	['1440','900'] #19" Monitor
]


os.system('py System/home.py')

for res in resolutions:
	os.system('py Cats/cat_view.py '+res[0]+' '+res[1])
