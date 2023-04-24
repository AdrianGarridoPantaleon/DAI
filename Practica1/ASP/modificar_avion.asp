<!-- #include FILE="conexion.asp" -->
<%
    idavion=Request.Form("idavion")
    avion=Request.form("avion")
    n_plazas=Request.form("n_plazas")
    precio_base=Request.form("precio_base")

    sql="UPDATE AVION SET AVION='" & avion &"',N_PLAZAS=" & n_plazas & ",PRECIO_BASE=" &precio_base & "WHERE IDAVION=" & idavion
    
    set rs=Conexion.Execute(sql)

    Response.Redirect("http://localhost/practica1/AJAX/gestion_aviones.asp")

    conexion.Close
    set conexion=nothing
%>