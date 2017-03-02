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

driver.get('http://localhost:8765/adopters/add');

f_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(7))
l_name=''.join(random.choice(string.ascii_uppercase + string.digits) for _ in range(7))

#First Name
elem = driver.find_element_by_id("first-name");
elem.location_once_scrolled_into_view
elem.send_keys(f_name);

#Last Name
elem = driver.find_element_by_id("last-name");
elem.location_once_scrolled_into_view
elem.send_keys(l_name);

#Email
elem = driver.find_element_by_id("email");
elem.location_once_scrolled_into_view
elem.send_keys(l_name+"@"+f_name+".net");

#Email
elem = driver.find_element_by_id("address");
elem.location_once_scrolled_into_view
elem.send_keys("1234 HomeTown Dr");

#Email
elem = driver.find_element_by_id("phone");
elem.location_once_scrolled_into_view
elem.send_keys("8082921233");

#Email
elem = driver.find_element_by_id("notes");
elem.location_once_scrolled_into_view
elem.send_keys("Lorem ipsum et else the ipsump notes with words and other long works with donkeys");

#Submit
elem = driver.find_element_by_id("AdopterAdd");
elem.location_once_scrolled_into_view
elem.click();

driver.quit()

# Check to see if it was added
db=_mysql.connect('localhost','root','root','paws_db')
db.query('SELECT * FROM adopters where first_name="'+f_name+'" AND last_name="'+l_name+'";')
r=db.store_result()

k=r.fetch_row(1,1)
sql_email = str(k[0].get('email'),'utf-8')

assert sql_email == l_name+"@"+f_name+".net"

if sql_email == l_name+"@"+f_name+".net":
	db.query('DELETE FROM adopters where first_name="'+f_name+'" AND last_name="'+l_name+'";')
