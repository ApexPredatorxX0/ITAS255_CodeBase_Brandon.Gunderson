// await, async, promise example
// adopted from: https://alligator.io/js/async-functions/

function who() {
  return new Promise(resolve => {
    setTimeout(() => {
      resolve('Graham');
    }, 2000);
  });
}

function what() {
  return new Promise(resolve => {
    setTimeout(() => {
      resolve('lurks');
    }, 3000);
  });
}

function where() {
  return new Promise(resolve => {
    setTimeout(() => {
      resolve('in the shadows');
    }, 5000);
  });
}

async function msg() {
  const a = await who();
  console.log(a);
  const b = await what();
  console.log(b);
  const c = await where();
  console.log(c);

  //console.log(`${ a } ${ b } ${ c }`);
}

msg(); // 🤡 lurks in the shadows <-- after 10 seconds


// We can use Promise.all() to make the three function calls happen in parallel
// the slowest one will end the Promise and result in the console log happening
// Promise.all is also using array destructuring to assing the a, b, c variables
//
async function msg2() {
  const [a, b, c] = await Promise.all([who(), what(), where()]);

  console.log(`Message 2: ${ a } ${ b } ${ c }`);
}

msg2(); // 🤡 lurks in the shadows <-- after 5000ms
