function containsURL(elementID)
{
    const urlRegex =/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
    const regexValidator = new RegExp(urlRegex);
    const inputValue = document.getElementById(elementID).value;
    return inputValue.match(regexValidator) != null; 

}

function dontAllowURL(elementID)
{
    const element = document.getElementById(elementID);

    if(containsURL(elementID))
    {
        element.setCustomValidity("El lugar de la consulta no puede ser un link");
        
    }

}