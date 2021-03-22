class Person {
    constructor(name, prename, age) {
        this.name = name;
        this.prename = prename;
        this.age = age;
    }

    fullName() {
        return this.prename + ' ' + this.name
    }
}

let kaj = new Person("Rauch", "Kaj", 22);

console.log(kaj.fullName())