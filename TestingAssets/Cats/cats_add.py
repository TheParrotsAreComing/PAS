import time

from selenium import webdriver
import selenium.webdriver.chrome.service as service

service = service.Service('D:\ChromeDriver\chromedriver')
service.start()
capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

driver = webdriver.Remote(service.service_url, capabilities)
driver.get('http://localhost:8765/cats/add');

#Cat Name
elem = driver.find_element_by_id("cat-name");
elem.send_keys("Roger");

#Breed/Color/Coat
elem = driver.find_element_by_id("breed-color-coat");
elem.send_keys("mixed");

#Microchip
elem = driver.find_element_by_id("microchip-2");
elem.send_keys("000001234");

#Adoption Fee
elem = driver.find_element_by_id("adoption-fee");
elem.send_keys("100");

#State
elem = driver.find_element_by_id("medical-notes");
elem.send_keys("He has no legs.");

#Phone
elem = driver.find_element_by_id("caretaker-notes");
elem.send_keys("This cat is so good. He's the best cat you've ever met. Trust me I know, I'm the smartest person you'll ever meet.");

#Submit
elem = driver.find_element_by_id("FosterAdd");
elem.click();

driver.quit()
