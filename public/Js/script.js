// (function()
// {

// })(jQuery);
const text = document.querySelector('.circleTxt');

text.innerHTML = text.textContent.replace(/\S/g,"<span>$&</span>");

const element = document.querySelectorAll('span');
for(let i = 0; i< element.length; i++)
{
	element[i].style.transform = "rotate("+i*13+"deg)"
}

