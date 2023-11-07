var sumarBtn = document.getElementById("sumar");
var restarBtn = document.getElementById("restar");
var quantityCount = document.getElementById("quantity");

sumarBtn.addEventListener("click", function() {
var currentCount = parseInt(quantityCount.innerText);
if (!isNaN(currentCount)) {
    currentCount++;
    quantityCount.innerText = currentCount;
}
});

restarBtn.addEventListener("click", function() {
var currentCount = parseInt(quantityCount.innerText);
if (!isNaN(currentCount) && currentCount > 0) {
    currentCount--;
    quantityCount.innerText = currentCount;
}
});