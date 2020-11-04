// functions.js
// Some ES6 function examples

// just writing some JavaScript!
var obj = { 
	name: 'Carrot', 
	_for: 'Max', // 'for' is a reserved word, use '_for' instead. 	details: { color: 'orange', size: 12 } 
}

console.log(obj);

// Anonymous Function
var flyToTheMoon = function(speed) {
	console.log("Flying to the moon at speed: " + speed);
}

flyToTheMoon(5);

// Immediately Invokable Function Expression (IIFE)
(function(){ 
     // all your code here 
     console.log("Here is the IIFE");
 })(); 

// Here is a FAT ARROW Function!

const flyToTheMoonArrow = (speed) => { console.log("Flying to the moon at speed: " + speed); };
flyToTheMoonArrow(10);


var smartPhones = [
	{ name:'iphone', price:649 },
	{ name:'Galaxy S6', price:576 },
	{ name:'Galaxy Note 5', price:489 }
];

// Useless function to loop through each piece of the smartPhones array, and convert it to 'Dog'!
const uselessFunction = smartPhones.map(() => `Dog`); 
//const uselessFunction = smartPhones.map(_ => `Dog`); 
console.log(uselessFunction); // Dog Dog Dog

	   
