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

driver.get('http://localhost:8765/cats/add');

c_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
m_chip=random.randint(100000,999999999)

#Cat Name
elem = driver.find_element_by_id("cat-name");
elem.location_once_scrolled_into_view
elem.send_keys(c_name);

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

#### 

#Breed/Color/Coat
elem = driver.find_element_by_id("breed");
elem.location_once_scrolled_into_view
elem.send_keys("mixed");

#Microchip
elem = driver.find_element_by_id("microchip-number");
elem.location_once_scrolled_into_view
elem.send_keys(m_chip);

#Adoption Fee
elem = driver.find_element_by_id("adoption-fee-amount");
elem.location_once_scrolled_into_view
elem.send_keys("100");

#State
elem = driver.find_element_by_id("specialty-notes");
elem.location_once_scrolled_into_view
elem.send_keys("He has no legs.");

#State
elem = driver.find_element_by_id("coat");
elem.location_once_scrolled_into_view
elem.send_keys("Fur");

#State
elem = driver.find_element_by_id("color");
elem.location_once_scrolled_into_view
elem.send_keys("Grey AF");

#State
elem = driver.find_element_by_id("switch-male");
elem.location_once_scrolled_into_view
elem.click()

#State
elem = driver.find_element_by_id("adult");
elem.location_once_scrolled_into_view
elem.click()

#Phone
elem = driver.find_element_by_id("bio");
elem.location_once_scrolled_into_view
elem.send_keys("This cat is so good. He's the best cat you've ever met. Trust me I know, I'm the smartest person you'll ever meet.");

#Submit
elem = driver.find_element_by_id("CatAdd");
elem.location_once_scrolled_into_view
elem.click();

driver.quit()

# Check to see if it was added
db=_mysql.connect('localhost','root','root','paws_db')
db.query('SELECT * FROM cats where microchip_number='+str(m_chip)+';')
r=db.store_result()

k=r.fetch_row(1,1)
sql_c_name = str(k[0].get('cat_name'),'utf-8')

assert sql_c_name == c_name

if sql_c_name == c_name:
	db.query('DELETE FROM cats where microchip_number='+str(m_chip)+';')
