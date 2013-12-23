// JavaScript Document

function checkLength(content,len)
{
	if(content.length<=len)
	{
		return false;
	}
	else
	{
		return true;
	}	
}

function checkDigit(content)
{
	var pattern=/^[0-9]+$/;
	return pattern.test(content);
}

function checkChar(content)
{
	var pattern=/^[a-zA-Z]+$/;
	return pattern.test(content);
}

function checkEmpty(content)
{
	if(content=="")
	{
		return false;	
	}
	return true;
}

function checkEmail(content)
{
	var pattern=/^\w+([.-]\w+)*@\w+([.-]\w+)*\.\w{2,8}$/;
	return pattern.test(content);
}

function checkPassword(content)
{
	return (/[a-z]+/.test(content) && /\d+/.test(content) && /[@%$!#%\*]+/.test(content));
}

function equalTo(val1,val2)
{
	if(val1==val2)
	{
		return true;	
	}
	else
	{
		return false;
	}
}
