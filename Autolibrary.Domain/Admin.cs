using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AutoLibrary.Domain
{
    public class Admin
    {
        public virtual int AdminID { get; set; }
        public virtual string firstName { get; set; }
        public virtual string lastName { get; set; }
        public virtual string userID { get; set; }
        public virtual string password { get; set; }
       

    }
}
