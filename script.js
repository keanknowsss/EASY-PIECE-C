function decrement(id)
{
    var x = id.value;
    if(x<=1)
    {
        id.value=1;
        alert('Quantity cannot be equal to zero');
    }
    else if(x>=1)
    {
        id.value--;
    }
}

function increment(id)
{
    id.value++;
}