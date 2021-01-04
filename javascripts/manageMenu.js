function test(var1, var2, var3, var4) {
    document.getElementById(var1).style.display = "block";
    document.getElementById(var2).style.display = "none";
    document.getElementById(var3).style.display = "none";
    document.getElementById(var4).style.display = "none";
    document.getElementById(var1+"Tab").style.backgroundColor = "white";
    document.getElementById(var1+"Tab").style.color = "black";
    document.getElementById(var2+"Tab").style.backgroundColor = "black";
    document.getElementById(var2+"Tab").style.color = "white";
    document.getElementById(var3+"Tab").style.backgroundColor = "black";
    document.getElementById(var3+"Tab").style.color = "white";
    document.getElementById(var4+"Tab").style.backgroundColor = "black";
    document.getElementById(var4+"Tab").style.color = "white";
}