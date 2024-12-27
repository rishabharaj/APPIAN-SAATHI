<%@page import="java.nio.file.StandardCopyOption"%>
<%@page import="java.nio.file.Files"%>
<%@page import="java.io.InputStream"%>
<%@page import="java.io.File"%>
<%@page import="java.sql.DriverManager,java.sql.PreparedStatement,java.sql.Connection"%>
<%
    
    String name = request.getParameter("name");
    String email= request.getParameter("email");
    String contact= request.getParameter("phone");
    String pass = request.getParameter("password");
    String cpass = request.getParameter("confirm-password");
   String doc = request.getParameter("DocName");
   Part filePart = request.getPart("upload");
   
            if(pass.equals(cpass))
            {
           Class.forName("com.mysql.jdbc.Driver");//Driver
            Connection con = DriverManager.getConnection("jdbc:mySQL://localhost:3306/mysql","root","root");
            PreparedStatement st = con.prepareStatement("insert into signup_table values(?,?,?,?,?)");
            st.setString(1,name);
            st.setString(2,email);
            st.setString(3,contact);
            st.setString(4,pass);
            st.setString(5,doc);
            // Handle file upload
                String fileName = filePart.getSubmittedFileName();
                String uploadDir = getServletContext().getRealPath("") + File.separator + "uploads";
                File uploadDirFile = new File(uploadDir);
                if (!uploadDirFile.exists()) {
                    uploadDirFile.mkdir(); 
                }
                File file = new File(uploadDir, fileName);
                try (InputStream fileContent = filePart.getInputStream()) {
                    Files.copy(fileContent, file.toPath(), StandardCopyOption.REPLACE_EXISTING);
                }
                st.setString(5, file.getAbsolutePath());
                
            st.executeUpdate();
            response.sendRedirect("Home.html");
            }
 %>