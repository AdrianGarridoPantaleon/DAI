<!-- #include FILE="conexion.asp" -->
<%
user=request.form("usuario")
pass=request.form("password")

if user="admin" and pass="1234" then
	session("Autentificado")=true
	response.redirect("gestion_aviones.asp")
else
	session("Autentificado")=false
	response.redirect("login.asp")
end if
%>
