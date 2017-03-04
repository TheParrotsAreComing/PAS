import time
import sys
import _mysql
import random
import string
import re


from selenium import webdriver
from selenium.webdriver.support.ui import Select
import selenium.webdriver.chrome.service as service

service = service.Service('D:\ChromeDriver\chromedriver')
service.start()
capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

driver = webdriver.Remote(service.service_url, capabilities)

driver.set_window_size(sys.argv[1], sys.argv[2]);

driver.get('http://localhost:8765/litters/add');

l_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
kc_ref=random.randint(100000,999999999)

#Litter Name
elem = driver.find_element_by_id("litter-name");
elem.location_once_scrolled_into_view
elem.send_keys(l_name);

#KC Reference ID
elem = driver.find_element_by_id("kc-ref-id");
elem.location_once_scrolled_into_view
elem.send_keys(kc_ref);

#Adult Cat Count
elem = driver.find_element_by_id("cat-count");
elem.location_once_scrolled_into_view
elem.send_keys(2);

#Kitten Count
elem = driver.find_element_by_id("kitten-count");
elem.location_once_scrolled_into_view
elem.send_keys(2);

#### DOB Select ###

#dob month
month = driver.find_element_by_name('dob[month]')
month.location_once_scrolled_into_view
dob_month = Select(month);

# select by value 
dob_month.select_by_value('01')

#dob day
dob_day = Select(driver.find_element_by_name('dob[day]'));

# select by value 
dob_day.select_by_value('01')

#dob yr
dob_yr = Select(driver.find_element_by_name('dob[year]'));

# select by value 
dob_yr.select_by_value('2012')

#Breed
elem = driver.find_element_by_id("breed");
elem.location_once_scrolled_into_view
elem.send_keys("Lion");

#Breed
elem = driver.find_element_by_id("est-arrival");
elem.location_once_scrolled_into_view
elem.send_keys("10-10-2020");

#Foster Notes
elem = driver.find_element_by_id("foster-notes");
elem.location_once_scrolled_into_view
elem.send_keys("Lorum ipsum samsung tivo roku google chrome seven go go hut twelve it's me not you.");

#General Notes
elem = driver.find_element_by_id("notes");
elem.location_once_scrolled_into_view
elem.send_keys("A quick pretty brown yellow red fox jumped and skipped slightly over a mouse, but failed and it seemed to miss it.");

#Submit
elem = driver.find_element_by_id("Litter-Add");
elem.location_once_scrolled_into_view
elem.click();

driver.quit()

# Check to see if it was added
db=_mysql.connect('localhost','root','root','paws_db')
db.query('SELECT * FROM litters where litter_name="'+l_name+'";')
r=db.store_result()

k=r.fetch_row(1,1)
sql_c_name = k[0].get('kc_ref_id')

if(str(sql_c_name) == str(kc_ref)):
	print("pass")

#if sql_c_name == c_name:
	#db.query('DELETE FROM cats where microchip_number='+str(m_chip)+';')
