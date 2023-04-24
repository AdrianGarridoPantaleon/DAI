<%
seguro=session("Autentificado")
if seguro<>true then
    response.redirect("login.asp")
end if
%>