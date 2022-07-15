
import TemplateFunctions from '../modules/Template.js';

class Home
{
	something()
	{
		console.log('Script home instalado')
	}

	init(options)
	{
		let self = this;
		self.something();
	}
}

export default Home;