[![Build Status](https://travis-ci.org/jgimeno/value-objects.svg?branch=master)](https://travis-ci.org/jgimeno/value-objects)
[![Coverage Status](https://coveralls.io/repos/github/jgimeno/value-objects/badge.svg?branch=master)](https://coveralls.io/github/jgimeno/value-objects?branch=master)
[![Code Climate](https://codeclimate.com/github/jgimeno/value-objects/badges/gpa.svg)](https://codeclimate.com/github/jgimeno/value-objects)
# Ultimate PHP Value Object Collection
Collection of PHP value objects to use and extend as building blocks for DDD.

This library comes with the idea of having a starting point for defining value objects for different projects.

All the value objects are inmutable.

## How to install

You can get it using composer:

composer require jgimeno/value-objects

## How to use

### Base objects

The idea of this library is to have a collection of objects as a 
base for the creation of your Domain.

The most basic object is the *ValueObject* which we can extend all the value objects we want to create
and we will get __toString() and equals() methods for free.

If we know that our value objects will benefit from the methods included in the
objects Strings, Number or Boolean, we can extend from there. 

Imagine that I create an object called *SonName* that our domain needs. In that case it could be
useful to extend from *Strings* and we will have methods like toUpperCase(), trim(), etc that we can 
benefit. You get the idea.

Last there is another base object called *Identifier*. This is usefult when 
creating ids, for example UserId can extend from identifier. Then we can do UserId::generate() and
we will have a unique userId generated using UUIDs.

### Useful objects

Internet/Email: Object representing an email adress, it throws exceptions 
when is not a valid email.

Internet/IpAddress: Object that represents an IpAdress, it throws exception 
when is not a valid ip address.