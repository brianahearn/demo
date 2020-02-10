## App Overview

Develop an API that allows a person track and manage their grocery shopping and meal planning.

## Features

- user (basic info, allergies, profile image)
- recipes (share with facebook?)
- categories
- products or ingredients?
- stores (Google Maps API -> Distance?)
- shopping lists
- shopping schedules (hook into google/apple calendar)
- budget (hook into finance apis ?)
- reminders (email SendGrid)

## Goals
- Restful MVC backend with JSON (Fractal/Pagination?)
- OO PHP / PSR
- MySQL w/ relational db design
- Setup Authentication OAuth 2 (Passport?)
- Show ability to connect to 3rd Party API Integrations (Google Maps, Slack, SendGrid, Elastic Search Etc..)
- Show basic PHP skills & adherence to standards
- Unit Testing / TDD / ETC...
- Provide use cases for databases (Relational, Key-value, In-memory, Document, Wide column, Graph, Time series, Ledger)
- Examples using MySQL, SQLite, MongoDB, PostgreSQL, Graph, REDIS
- Convert project to multiple frameworks/languages PHP - (Laravel, Symfony), Node.js - (Express/Koa), Java - (Spring, Struts, Hibernate), Elixir(Phoenix), Go (Revel, Gin)
- React frontend
- Host project on Google/Amazon w/ Kubernetes + Docker

##Todo
- DB
- Authentication
- User
- Pantry
- Products
- Categories
- Recipes
- RecipeSteps
- Assets
- Shopping List
- Store Shopping List
- Store Shopping List Products
- Stores
- Hashing/UUIDs/etc.
- Budget / Tracking Expenses

## Schema - Subject to change
User has one Pantry
User has many Recipes
User has many Stores (pivot many to many)
User has many Schedules
User has many ShoppingList

Pantry has many Products (Soft delete to preserve history we could also make a past products table)

Stores have many Products
Stores have many Users (pivot many to many)

Ingredients have one Category

Recipes have many Steps
Recipes have many Products
Recipes have many Categories

Assets have one of any model

## Questions/Features to investigate down the road
- Do ingredients need to have a store?
- What relationship optimizations and connections can we make?
- Substitute items in recipes?
- Coupons/Deals?
- Pricing/Budget/Spending?
- Category - sub categories or no?
