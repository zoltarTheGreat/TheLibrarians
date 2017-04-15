using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AutoLibrary.Domain
{
    public interface Checkout
    {
        IQueryable<Books> Books { get;  }
        IQueryable<Student> Students { get;  }
    }
}
