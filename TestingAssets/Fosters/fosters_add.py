import time

from selenium import webdriver
import selenium.webdriver.chrome.service as service

service = service.Service('D:\ChromeDriver\chromedriver')
service.start()
capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

driver = webdriver.Remote(service.service_url, capabilities)
driver.get('http://localhost:8765/fosters/add');

#First Name
elem = driver.find_element_by_id("first-name");
elem.send_keys("Roger");

#Last Name
elem = driver.find_element_by_id("last-name");
elem.send_keys("Dodger");

#Email
elem = driver.find_element_by_id("email");
elem.send_keys("droid1@the.empire");

#Address
elem = driver.find_element_by_id("address");
elem.send_keys("123 DeathStar Lane");

#City
elem = driver.find_element_by_id("phone");
elem.send_keys("1231231234");

#Experience
elem = driver.find_element_by_id("exp");
elem.send_keys("Seven");

#Availability
elem = driver.find_element_by_id("avail");
elem.send_keys("Now");

#Submit
elem = driver.find_element_by_id("FosterAdd");
elem.click();

driver.quit()
