const url = 'https://getitsms-whatsapp-apis.p.rapidapi.com/45?your_number=919876543210&your_message=your%20message';
const options = {
	method: 'POST',
	headers: {
		'content-type': 'application/json',
		'X-RapidAPI-Key': '0b8734a6a8mshffab75b0abb01b7p1cba67jsncc3b4c2a45f2',
		'X-RapidAPI-Host': 'getitsms-whatsapp-apis.p.rapidapi.com'
	},
	body: {
		your_number: '7990521646',
		your_message: 'your message'
	}
};

try {
	const response = await fetch(url, options);
	const result = await response.text();
	console.log(result);
} catch (error) {
	console.error(error);
}