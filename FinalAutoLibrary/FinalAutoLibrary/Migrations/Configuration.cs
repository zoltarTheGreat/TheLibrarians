namespace FinalAutoLibrary.Migrations
{

    using Microsoft.AspNet.Identity.EntityFramework;
    using System.Data.Entity.Migrations;
    using System.Linq;
    using Microsoft.AspNet.Identity;
    using FinalAutoLibrary.Models;
    using FinalAutoLibrary.Controllers;

    internal sealed class Configuration : DbMigrationsConfiguration<FinalAutoLibrary.Models.ApplicationDbContext>
    {
        public Configuration()
        {
            AutomaticMigrationsEnabled = true;
            ContextKey = "Identity.Models.ApplicationDbContext";
        }

        protected override void Seed(FinalAutoLibrary.Models.ApplicationDbContext context)
        {
         
       

            if(!context.Users.Any(u => u.Email == "ccabr071@fiu.edu"))
            {
                var store = new UserStore<ApplicationUser>(context);
                var manager = new UserManager<ApplicationUser>(store);
                var user = new ApplicationUser { UserName = "ccabr071@fiu.edu", Email = "ccabr071@fiu.edu" };
                

               

                manager.Create(user, "P@ssword1");
            }


            context.Books.AddOrUpdate(b => b.Title,
                new Book
                {
                    Title = "The Giving Tree",
                    AuthorFirst = "Shel",
                    AuthorLast = "Silverstein",
                    Genre = "Picture Book",
                    Year = 1964
                },
                 new Book
                 {
                     Title = "Test",
                     AuthorFirst = "Tester",
                     AuthorLast = "Test",
                     Genre = "Test Book",
                     Year = 2016
                 });
        }
    }
}
