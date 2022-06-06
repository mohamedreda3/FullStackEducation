using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Education
{
    #region Admin
    public class Admin
    {
        #region Member Variables
        protected string _admin_eml;
        protected string _admin_psrd;
        protected string _admin_img;
        protected int _admin_id;
        protected string _username;
        #endregion
        #region Constructors
        public Admin() { }
        public Admin(string admin_psrd, string admin_img, int admin_id, string username)
        {
            this._admin_psrd=admin_psrd;
            this._admin_img=admin_img;
            this._admin_id=admin_id;
            this._username=username;
        }
        #endregion
        #region Public Properties
        public virtual string Admin_eml
        {
            get {return _admin_eml;}
            set {_admin_eml=value;}
        }
        public virtual string Admin_psrd
        {
            get {return _admin_psrd;}
            set {_admin_psrd=value;}
        }
        public virtual string Admin_img
        {
            get {return _admin_img;}
            set {_admin_img=value;}
        }
        public virtual int Admin_id
        {
            get {return _admin_id;}
            set {_admin_id=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Education
{
    #region Classes
    public class Classes
    {
        #region Member Variables
        protected string _class_code;
        protected string _class_name;
        #endregion
        #region Constructors
        public Classes() { }
        public Classes(string class_name)
        {
            this._class_name=class_name;
        }
        #endregion
        #region Public Properties
        public virtual string Class_code
        {
            get {return _class_code;}
            set {_class_code=value;}
        }
        public virtual string Class_name
        {
            get {return _class_name;}
            set {_class_name=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Education
{
    #region Students
    public class Students
    {
        #region Member Variables
        protected int _stu_id;
        protected string _stu_eml;
        protected string _stu_psrd;
        protected string _stu_nm;
        protected string _stu_adrs;
        protected string _stu_phone;
        protected string _stu_img;
        #endregion
        #region Constructors
        public Students() { }
        public Students(int stu_id, string stu_psrd, string stu_nm, string stu_adrs, string stu_phone, string stu_img)
        {
            this._stu_id=stu_id;
            this._stu_psrd=stu_psrd;
            this._stu_nm=stu_nm;
            this._stu_adrs=stu_adrs;
            this._stu_phone=stu_phone;
            this._stu_img=stu_img;
        }
        #endregion
        #region Public Properties
        public virtual int Stu_id
        {
            get {return _stu_id;}
            set {_stu_id=value;}
        }
        public virtual string Stu_eml
        {
            get {return _stu_eml;}
            set {_stu_eml=value;}
        }
        public virtual string Stu_psrd
        {
            get {return _stu_psrd;}
            set {_stu_psrd=value;}
        }
        public virtual string Stu_nm
        {
            get {return _stu_nm;}
            set {_stu_nm=value;}
        }
        public virtual string Stu_adrs
        {
            get {return _stu_adrs;}
            set {_stu_adrs=value;}
        }
        public virtual string Stu_phone
        {
            get {return _stu_phone;}
            set {_stu_phone=value;}
        }
        public virtual string Stu_img
        {
            get {return _stu_img;}
            set {_stu_img=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Education
{
    #region Stu_class
    public class Stu_class
    {
        #region Member Variables
        protected string _stu_eml;
        protected string _class_id;
        protected unknown _student_grade_in_this_class;
        #endregion
        #region Constructors
        public Stu_class() { }
        public Stu_class(unknown student_grade_in_this_class)
        {
            this._student_grade_in_this_class=student_grade_in_this_class;
        }
        #endregion
        #region Public Properties
        public virtual string Stu_eml
        {
            get {return _stu_eml;}
            set {_stu_eml=value;}
        }
        public virtual string Class_id
        {
            get {return _class_id;}
            set {_class_id=value;}
        }
        public virtual unknown Student_grade_in_this_class
        {
            get {return _student_grade_in_this_class;}
            set {_student_grade_in_this_class=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Education
{
    #region Subjects
    public class Subjects
    {
        #region Member Variables
        protected string _subject_name;
        protected string _subject_code;
        protected string _class_code;
        #endregion
        #region Constructors
        public Subjects() { }
        public Subjects(string subject_name)
        {
            this._subject_name=subject_name;
        }
        #endregion
        #region Public Properties
        public virtual string Subject_name
        {
            get {return _subject_name;}
            set {_subject_name=value;}
        }
        public virtual string Subject_code
        {
            get {return _subject_code;}
            set {_subject_code=value;}
        }
        public virtual string Class_code
        {
            get {return _class_code;}
            set {_class_code=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Education
{
    #region Subjects_grades
    public class Subjects_grades
    {
        #region Member Variables
        protected unknown _subject_grade;
        protected string _subject_code;
        protected string _student_email;
        #endregion
        #region Constructors
        public Subjects_grades() { }
        public Subjects_grades(unknown subject_grade)
        {
            this._subject_grade=subject_grade;
        }
        #endregion
        #region Public Properties
        public virtual unknown Subject_grade
        {
            get {return _subject_grade;}
            set {_subject_grade=value;}
        }
        public virtual string Subject_code
        {
            get {return _subject_code;}
            set {_subject_code=value;}
        }
        public virtual string Student_email
        {
            get {return _student_email;}
            set {_student_email=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Education
{
    #region Teachers
    public class Teachers
    {
        #region Member Variables
        protected int _teacher_id;
        protected string _teacher_name;
        protected string _teacher_eml;
        protected string _teacher_img;
        protected string _teacher_nphone;
        protected string _teacher_psrd;
        #endregion
        #region Constructors
        public Teachers() { }
        public Teachers(int teacher_id, string teacher_name, string teacher_img, string teacher_nphone, string teacher_psrd)
        {
            this._teacher_id=teacher_id;
            this._teacher_name=teacher_name;
            this._teacher_img=teacher_img;
            this._teacher_nphone=teacher_nphone;
            this._teacher_psrd=teacher_psrd;
        }
        #endregion
        #region Public Properties
        public virtual int Teacher_id
        {
            get {return _teacher_id;}
            set {_teacher_id=value;}
        }
        public virtual string Teacher_name
        {
            get {return _teacher_name;}
            set {_teacher_name=value;}
        }
        public virtual string Teacher_eml
        {
            get {return _teacher_eml;}
            set {_teacher_eml=value;}
        }
        public virtual string Teacher_img
        {
            get {return _teacher_img;}
            set {_teacher_img=value;}
        }
        public virtual string Teacher_nphone
        {
            get {return _teacher_nphone;}
            set {_teacher_nphone=value;}
        }
        public virtual string Teacher_psrd
        {
            get {return _teacher_psrd;}
            set {_teacher_psrd=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Education
{
    #region Tech_class
    public class Tech_class
    {
        #region Member Variables
        protected string _class_id;
        protected string _email;
        #endregion
        #region Constructors
        public Tech_class() { }
        public Tech_class()
        {
        }
        #endregion
        #region Public Properties
        public virtual string Class_id
        {
            get {return _class_id;}
            set {_class_id=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        #endregion
    }
    #endregion
}