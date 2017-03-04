import time
import sys
import random
import string
import re
import selenium.webdriver.chrome.service as service


from selenium.webdriver.common.by import By

from selenium import webdriver
from selenium.webdriver.support.ui import Select
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException

service = service.Service('D:\ChromeDriver\chromedriver')
service.start()
capabilities = {'chrome.binary': 'C:\Program Files (x86)\Google\Chrome\Application\chrome'} # Chrome path is different for everyone

driver = webdriver.Remote(service.service_url, capabilities)
driver.set_window_size(375, 667);
driver.get('http://localhost:8765/');


cat_link = driver.find_element_by_css_selector('a.pas-home-button-cont[href="/cats"]')
cat_link.click()

m = re.search('cats',driver.current_url)

assert m.group(0) == 'cats'

driver.execute_script("window.history.go(-1)")

adopter_link = driver.find_element_by_css_selector('a.pas-home-button-cont[href="/adopters"]')
adopter_link.click()

al = re.search('adopters',driver.current_url)

assert al.group(0) == 'adopters'

driver.execute_script("window.history.go(-1)")

fosters_link = driver.find_element_by_css_selector('a.pas-home-button-cont[href="/fosters"]')
fosters_link.click()

fl = re.search('fosters',driver.current_url)

assert fl.group(0) == 'fosters'

driver.execute_script("window.history.go(-1)")

litters_link = driver.find_element_by_css_selector('a.pas-home-button-cont[href="/litters"]')
litters_link.click()

ll = re.search('litters',driver.current_url)

assert ll.group(0) == 'litters'

driver.execute_script("window.history.go(-1)")

# implementatiosn left:
# messagaes
# volunteers/users
# setttings

driver.quit()
