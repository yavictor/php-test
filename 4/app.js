//Создать массив объектов класса описанных в пункте 1 и произвольно
// проинициализировать их. В цикле от 0 до кол-ва элементов в массиве вывести квадраты
// значений элементов в массиве.

import Multiplier from '../3/';

const collLength = 10;
const result = [];
for (let i = 0; i < collLength; i += 1) {
    const randomNumber =  Math.floor(Math.random() * collLength + 2);
    result.push(new Multiplier(randomNumber));
}
result.forEach(el => console.log(el.getSqrt()));
