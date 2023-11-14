
<style>
p{
color: blue;
}
</style>

<p id="name">felipe</p>

<button onclick= "mudarCor('red')">vermei</button>
<button onclick= "mudarCor('yellow')">amarelo</button>
<button onclick= "mudarCor('green')">verde</button>

<script>
function mudarCor(novaCor){
document.getElementById("name").style.color = novaCor;
}
</script>

<?php
function makecoffee($acao = "café")
{
    echo "Fazendo $acao!";
} 

echo makecoffee();
echo makecoffee(null);
echo makecoffee("espresso");
?>