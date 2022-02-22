function calcular() {
    var num1 = 2800;
    var num2 = Number(document.getElementById("num2").value);
    var elemResult = document.getElementById("resultado");
    var tax1 = 69;
    var tax2 = 79;

    var tax_1 = (num1 * tax1)/10000  
    var tax_2 = (num1 * tax2)/10000


    if (num2 == 0){
        elemResult.textContent = "R$: " + String(num1 ) + ".00";
    }
    else if (num2 <= 6){
        elemResult.textContent =  "R$: " + String(num1 + tax_1);
    }
    else if (num2 >= 7){
        elemResult.textContent =  "R$: " + String(num1 + tax_2);
    }
    else {
        elemResult.textContent =  "ERROR";
    }


}
