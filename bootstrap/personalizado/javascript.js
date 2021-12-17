function confirmacion(url_val){ /// esto es lo popup
    if(confirm('Seguro que desea eliminar?') == false)
    {
        return false;
    }
    else
    {
        location.href=url_val;
    }
}