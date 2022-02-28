//Создать класс имеющий 1 входной параметр, который инициализирует поле id. В классе
// должен быть реализован метод, который возвращает квадрат поля id.

export class Multiplier {

    constructor(number) {
        this.id = number;
    }

    getSqrt() {
        return this.id ** 2;
    }
};
