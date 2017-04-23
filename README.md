# CS411_Final_Project_Spring2017

1.  OBJECTIVE
When the user search and follow the item they are interested in, our website will recommend related products according to user's information and prove the trend of the price changing based on the up-to-date prices. User can use those functions to buy their wished product with the lowest price.
2. USEFULNESS
Nowadays, the price of one product will change almost every day. For instance, One computer can be $300 on Monday and $250 on Tuesday. Sometimes, the sellers will tell the customers that something is on sale on BLACK FRIDAY or with other deals. However, the products' price increases one week before BLACK FRIDAY and then drop during the BLACK FRIDAY. This website can help customers to determine if the product is "really" on sale. People can know the trend of this product's price. At the same time, the website can recommend some products to the users according to their sex, income, age. So the users can choose something suitable for them.
3. DATA
The products' information of the Items: Item_No, Item_Name, Item_URL, Item_date,Item Price of the date.
4. ER DIAGRAM AND SCHEMA


5. DATA SOURCE
The data we have used in our database are from Amazon API, www.amazon.com and from hand making.
6. FUNCTIONALITY OF APPLICATION
Track price:
Recommendation: Every user can follow the products they are interested in. This program can recommend the products to the users who may be interested in these items. For example, A person who is 23 years old, $6000 income one month and he is a male. If he follows a Dell computer, then the website will likely to recommend this product to the people like him. In one word, the website will likely to recommend people products based on other peoples' follow.
Search Item: The users can search one product by name.
Remove Item: The users can delete the item.
Insert(Add) Item,: The users can change the name of one item.

7. BASIC FUNCTION EXAMPLE
Search Item: The users can search one product by name. According to the name, the users can serach one product by name and the system will show the results to users on website.
8. SQL CODE SNIPPET

9. DATAFLOW
The user follow a product:
1.the product's number will be added to the follow entity.
2.The product will be calculated for the recommendation.
3.The product will be added to the users entity.
10. ADVANCED FUNCTIONS
1.Price Tracker:
2I am feeling lucky (Recommendation): We want to recommend some products to the users according to their sex, income, age. So the users can choose something suitable for them. When a customer follows a product, the product's number will be added to the following entity. For example, A male who is 30 years old, earns $5000 income one month follows a Dell computer. The people follows this computer is M, the number of people under 30 years old follows the product is i, the people whose income is $5000-$6000 follows the item is j, the male follows the item is k.The score of the item for a user is p1*(i/M)+p2*(j/M)+p3*(k/M)+p4(p1,p2,p3,p4 are the parameters); as a result, the system will score each item, and the highest score of these items will be recommended to the users.

11. CHALLENGES
We do not familiar with php language and spend much time solve the language problem.
When the user log in, we need global variables to do the following tasks.
We spend much time to design the website and plot the chart. 
12. DIFFER FROM INITIAL PLAN
A little change is that we give up the prediction function and change to the recommendation function which is more useful for users.
13. LABOR DIVISION
Tony Lou designed one advanced function and design all the website.
Zhiyu Zhu designed and finished the basic functions. 
Tianyi Shan designed one advanced function and accomplish the website.
No labels Edit Labels
User icon: Add a picture of yourself
