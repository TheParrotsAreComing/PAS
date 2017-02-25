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
driver.set_window_size(375, 667);
driver.get('http://localhost:8765/cats/add');

c_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(6))
m_chip=random.randint(100000,999999999)

#Cat Name
elem = driver.find_element_by_id("cat-name");
elem.send_keys(c_name);

#### DOB Select ###

#dob month
dob_month = Select(driver.find_element_by_name('dob[month]'));

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

#### Microchip Select ###

#microchiped_date month
mc_month = Select(driver.find_element_by_name('microchiped_date[month]'));

# select by value 
mc_month.select_by_value('01')

#microchiped_date day
mc_day = Select(driver.find_element_by_name('microchiped_date[day]'));

# select by value 
mc_day.select_by_value('01')

#microchiped_date yr
mc_yr = Select(driver.find_element_by_name('microchiped_date[year]'));

# select by value 
mc_yr.select_by_value('2012')

#### 

#Breed/Color/Coat
elem = driver.find_element_by_id("breed");
elem.send_keys("mixed");

#Microchip
elem = driver.find_element_by_id("microchip-number");
elem.send_keys(m_chip);

#Adoption Fee
elem = driver.find_element_by_id("adoption-fee-amount");
elem.send_keys("100");

#State
elem = driver.find_element_by_id("medical-notes");
elem.send_keys("He has no legs.");

#Phone
elem = driver.find_element_by_id("caretaker-notes");
elem.send_keys("This cat is so good. He's the best cat you've ever met. Trust me I know, I'm the smartest person you'll ever meet.");

#Submit
elem = driver.find_element_by_id("CatAdd");
elem.click();

driver.quit()

# Check to see if it was added
db=_mysql.connect('localhost','root','root','paws_db')
db.query('SELECT * FROM cats where microchip_number='+str(m_chip)+';')
r=db.store_result()

k=r.fetch_row(1,1)
sql_c_name = str(k[0].get('cat_name'),'utf-8')

assert sql_c_name == c_name
