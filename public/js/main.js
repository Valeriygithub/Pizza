// console.log(' Мой JS фаил подключен ко всем страницам');

let cartSpan = document.querySelector('.cart_span');
let payProduct = document.querySelectorAll('.pay');
let numberCart = document.querySelectorAll('.sum-item'); //  если беру один то не хочет работатть как надо
let allSum = document.querySelector('.all-sum');
let minusCart = document.querySelectorAll('.minus-cart');


// ============ keyframe-btn ================
function btnttn() {
	let btnSecondary = document.querySelectorAll('.btn-pay');
	btnSecondary.forEach(el => {
		el.addEventListener('click', function () {
			setTimeout(el.classList.add('btn-fack'), 5000);
			console.log(el);
		})
	})
}
btnttn();

payProduct.forEach(element => {

	element.addEventListener('click', async function (e) {
		e.preventDefault();
		let aPay = this;
		let aHref = this.getAttribute('href'); // получил а ее сылку чтоб не перегружалась страница
		let response = await fetch(aHref);
		let data = await response.json();
		console.log(data);
		cartSpan.textContent = Number(cartSpan.textContent) + 1;
		allSum.textContent = data.totalCount;
		let el = aPay.parentElement.querySelector(".sum-item");
		el.textContent = Number(el.textContent) + 1;

	})
});

minusCart.forEach(element => {

	element.addEventListener('click', async function (e) {
		e.preventDefault();
		let aPay = this;
		let aHref = this.getAttribute('href'); // получил а ее сылку чтоб не перегружалась страница
		let response = await fetch(aHref);
		let data = await response.json();
		cartSpan.textContent = data.totalQuantity;
		allSum.textContent = data.totalCount;
		let el = aPay.parentElement.querySelector(".sum-item");
		if (Number(el.textContent) > 1) {
			el.textContent = Number(el.textContent) - 1;
		}
	})
});

