<!-- #include FILE="conexion.asp" -->
<%
    idavion=Request.form("idavion")
    avion=Request.form("avion")
    n_plazas=Request.form("n_plazas")
    precio_base=Request.form("precio_base")

    sql="insert into AVION values(" & idavion & ", '" & avion & "', '" & n_plazas & "', '" & precio_base & "')"

    set rs=Conexion.Execute(sql)

    Response.Redirect("http://localhost/practica1/AJAX/gestion_aviones.asp")

    conexion.Close
    set conexion=nothing
%>