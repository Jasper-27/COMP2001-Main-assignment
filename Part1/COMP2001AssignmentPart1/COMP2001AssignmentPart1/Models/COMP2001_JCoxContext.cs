using System;
using System.Data;
using System.Security.Cryptography;
using System.Text;
using COMP2001AssignmentPart1.Controllers;
using Microsoft.Data.SqlClient;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;

#nullable disable

namespace COMP2001AssignmentPart1.Models
{
    public partial class COMP2001_JCoxContext : DbContext
    {
        private string GlobalSalt = "f8fe830d12751e49619147e859b5f0a11947e118920ad69c3ca16b492eb4ffd4b9ef1f6afded1e99d643726135506ae85988f39c979d9299d1153c704c8b09fc"; 


        public COMP2001_JCoxContext()
        {

        }

        public COMP2001_JCoxContext(DbContextOptions<COMP2001_JCoxContext> options)
            : base(options)
        {
        }

     
        public virtual DbSet<User> Users { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
//            if (!optionsBuilder.IsConfigured)
//            {
//#warning To protect potentially sensitive information in your connection string, you should move it out of source code. You can avoid scaffolding the connection string by using the Name= syntax to read it from configuration - see https://go.microsoft.com/fwlink/?linkid=2131148. For more guidance on storing connection strings, see http://go.microsoft.com/fwlink/?LinkId=723263.
//                optionsBuilder.UseSqlServer("Server=socem1.uopnet.plymouth.ac.uk;Database=COMP2001_JCox;User Id=JCox; Password=UuuC190+");
//            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.HasAnnotation("Relational:Collation", "Latin1_General_CI_AS");

           
            modelBuilder.Entity<User>(entity =>
            {
                entity.Property(e => e.UserId)
                    .ValueGeneratedNever()
                    .HasColumnName("user_id");

                entity.Property(e => e.Email)
                    .IsRequired()
                    .HasMaxLength(255)
                    .IsUnicode(false)
                    .HasColumnName("email");

                entity.Property(e => e.Firstname)
                    .IsRequired()
                    .HasMaxLength(30)
                    .IsUnicode(false)
                    .HasColumnName("firstname");

                entity.Property(e => e.Lastname)
                    .IsRequired()
                    .HasMaxLength(30)
                    .IsUnicode(false)
                    .HasColumnName("lastname");

                entity.Property(e => e.Password)
                    .IsRequired()
                    .HasMaxLength(255)
                    .IsUnicode(false)
                    .HasColumnName("password");
            });

            OnModelCreatingPartial(modelBuilder);
        }

        partial void OnModelCreatingPartial(ModelBuilder modelBuilder);


        public void spUsers_register(User user)
        {
            // Output parameter must be declared in advance so its direction can be set to output (output parameters are also needed to get return values)
            SqlParameter response = new SqlParameter("@ResponseMessage", SqlDbType.VarChar, 10);
            response.Direction = ParameterDirection.Output;

            user.Password = hashPassword(user.Password, GlobalSalt); 

            Database.ExecuteSqlRaw("EXEC spUsers_register @firstname, @lastname, @email, @password, @responseMessage OUTPUT",
                new SqlParameter("@firstname", user.Firstname),
                new SqlParameter("@lastname", user.Lastname),
                new SqlParameter("@email", user.Email),
                new SqlParameter("@password", user.Password),
                response); ;

            string responseString = response.Value.ToString();  // This will contain the value that the stored procedure placed in @ResponseMessage
        }


        public int spUsers_validate(User user)
        {
            user.Password = hashPassword(user.Password, GlobalSalt);

            var returnParameter = new SqlParameter("@ReturnValue", SqlDbType.Int);
            returnParameter.Direction = ParameterDirection.Output;

            Database.ExecuteSqlRaw("EXEC @ReturnValue = spUsers_validate @email, @password ",
                new SqlParameter("@email", user.Email),
                new SqlParameter("@password", user.Password),
                returnParameter);

            int result = (int)returnParameter.Value;

            return result; 
        }

        public void spUsers_delete(User user) {
            Database.ExecuteSqlRaw("EXEC spUsers_delete @user_id ",
                   new SqlParameter("@user_id", user.UserId));
        }


        public void spUsers_update(int user_id, User user)
        {
            user.Password = hashPassword(user.Password, GlobalSalt);

            object _firstname = null;
            object _lastname = null;
            object _email = null;
            object _password = null;


            if (user.Firstname == ""){
                _firstname = DBNull.Value;
            }
            else
            {
                _firstname = user.Firstname; 
            }



            if (user.Lastname == "")
            {
                _lastname = DBNull.Value;
            }
            else
            {
                _lastname = user.Lastname;
            }




            if (user.Email == "")
            {
                _email = DBNull.Value;
            }
            else
            {
                _email = user.Email;
            }




            if (user.Password == "")
            {
                _password = DBNull.Value;
            }
            else
            {
                _password = user.Password;
            }


      

            Database.ExecuteSqlRaw("EXEC spUsers_update @user_id, @firstname, @lastname, @email, @password",
                new SqlParameter("@user_id", user_id),
                new SqlParameter("@firstname", _firstname),
                new SqlParameter("@lastname", _lastname),
                new SqlParameter("@email", _email),
                new SqlParameter("@password", _password) ) ;

        }

        public string hashPassword(string password, string salt)
        {
            byte[] bytes = Encoding.Unicode.GetBytes(password);
            byte[] src = Encoding.Unicode.GetBytes(salt);
            byte[] dst = new byte[src.Length + bytes.Length];
            Buffer.BlockCopy(src, 0, dst, 0, src.Length);
            Buffer.BlockCopy(bytes, 0, dst, src.Length, bytes.Length);
            HashAlgorithm algorithm = HashAlgorithm.Create("SHA1");
            byte[] inarray = algorithm.ComputeHash(dst);
            return Convert.ToBase64String(inarray);
        }



    }

   



}
