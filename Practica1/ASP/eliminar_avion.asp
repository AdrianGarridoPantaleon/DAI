<!-- #include FILE="conexion.asp" -->
<%
    idavion=Request.QueryString("id")

    sql="DELETE FROM AVION WHERE IDAVION=" & idavion 

    set rs=Conexion.Execute(sql)

    Response.Redirect("http://localhost/practica1/AJAX/gestion_aviones.asp")

    conexion.Close
    set conexion=nothing
%>