<script type="text/javascript" src="<?php echo $html->url("/scroll_catchers/script/$access_code"); ?>">
</script>
<div>
  <h3>
    InfoWorld review: Tools for rapid Web development
  </h3>
  <h4>
    With WYSIWYG prototyping environments and preconfigured graphical components, rapid Web development tools can help you build applications faster -- but with less flexibility
  </h4>
  <p>
    When it's time to develop your Web application, you have choices: You could roll up your sleeves, select your programming languages, pile references manuals on your desk, and begin the time-consuming task of building your application from scratch. You might take a shortcut and grab one of the many open source frameworks available, such as symfony or Zend for PHP programmers, Django for Python users, Ruby on Rails, and so forth. Or you might consider one of the many rapid development tools now available to the Web world.

I had a chance to test-drive five Web development systems that claim to significantly cut application development time: Alpha Software's Alpha Five 10; Iron Speed Designer 6.2.1; LANSA's LANSA for the Web 11.5; OutSystem's Agile Platform 5.0; and MLState's OPA (One Pot Application) 2.0 Beta.

[ Show your support for InfoWorld's peace plan between Apple and Flash. | Keep up with app dev issues and trends with InfoWorld's Fatal Exception and Strategic Developer blogs. ]

Based on my testing, I can say that these tools provide a speed boost to development with features such as WYSIWYG prototyping environments, loads of prebuilt graphical components, and easy deployment. Importantly, some of the tools are specialized, designed primarily for constructing database-centric Web applications, but even those tools offer enough flexibility to create more generic apps.

Find out how the Web development tools fared in InfoWorld Test Center's review. (Please note that we did not score OPA 2.0, as it's still in beta.)

    * Alpha Five 10
    * Iron Speed Designer 6.2.1
    * LANSA for the Web 11.5
    * OutSystem Agile Platform 5.0
    * MLState OPA 2.0 Beta

    <em>Alpha Five 10</em>
First released way back in 1982, Alpha Five at first blush appears to be just a database management tool, capable of talking to MySQL, Oracle, SQL Server, or any RDBMs with an ODBC or ADO interface. Were those its only functions, it would still be an admirable product. Although building database applications -- desktop and Web-based -- are Alpha Five's forte, it is nevertheless flexible enough for developing general Web applications. However, there's likely no advantage to using Alpha Five for the latter as opposed to, say, ASP.Net.

Alpha Five includes its own Web application server, referred to as WAS (Web Application Server). Neither an IIS nor Apache variant, WAS recognizes A5W pages -- files that include HTML with embedded Xbasic, the company's proprietary language that is in no way related to the open source language of the same name. Other than the ability to run A5W pages, WAS behaves much like other Web servers. It has its own root directory (C:\A5Webroot on a development system) from which applications are deployed.

Xbasic powers the behavior of most controls in desktop applications and executes an Alpha Five Web application's server-side code. Alpha Five's Xbasic has everything you'd find in any complete BASIC-language implementation, with additional system objects and functions for manipulating databases.

Web development in Alpha Five draws upon a massive collection of UI components, reinforced by an extensive event model with server- and client-side hooks. Alpha Five strikes a good balance between shielding developers from writing code, while permitting them to do so when necessary. Its codeless AJAX feature helps you build AJAX-enabled controls without having to write AJAX. Its event hooks mean you can easily incorporate third-party JavaScript libraries such as Dojo or jQuery.

You build Web applications in Alpha Five one page at a time. First, you select the components you'll be using on a Web page, then you work with the WYSIWYG HTML editor to stitch the components together into a final form. Double-click on any component within this editor, and a component editor opens, where you can modify the component's properties.

Alpha Five's supply of Web components include grids, forms, dialogs, navigation components (such as toolbars and menus), login components, and others. There are countless variations on these themes. Each component is awash with configurable properties and comes with plenty of event hooks for attaching custom code. Select a control and choose an event from the list recognized by the control; you're taken to the stub Xbasic function that responds to that event. If you've used any popular component-based IDE GUI-building environment, you'll be right at home here.

Many of the more complex controls include intelligently predefined actions. For example, when a user has entered data into a form control and clicks the Submit button, the values within the form are validated. If they all "pass," the system executes the Xbasic routine identified by the form's AfterValidate event.
Alpha Five has special "component builders" that act like wizards for constructing grids and dialogs. Perhaps no control has more variations than the grid control; it is the quintessential means of displaying and managing databases, and therefore receives special treatment. You can select numerous grid geometries for displaying either single or multiple records simultaneously. You can go pretty crazy, linking grids to other grids; as long as there is a relationship in the database between one table and another, that relationship can be used to set up parent/child grid connections. These can be nested to virtually any depth.

Some controls are stunningly elaborate. The latest version of Alpha Five includes Supercontrols, which are controls that have been subclassed for specific applications. For example, the Google Maps Supercontrol lets you access Google Maps through that service's REST interface. You can use this control to, say, call up a map within a grid control, based on an address fetched from a database field.

Alpha Five uses the term genie rather than wizard to describe automated screens that guide you through gnarlier construction activities. Most grid controls populate their contents based on database queries, and the Query Genie helps you build those queries. The Query Genie is unusual in that it lets you build queries in an additive fashion, a final query being the sum of multiple smaller queries. Alpha Five even has a query by example (QBE) feature. With QBE, you enter representative values for attributes and specify the matching criteria; the QBE control will fetch rows that match the representative example.

To deploy an application, you first define a profile. This not only tells Alpha Five the destination of the deployment, but describes the mechanism whereby the code is delivered: FTP, a remote disk share, and so on. You can create multiple profiles, which enable you to deploy a single application to a variety of destinations.

Alpha Five's documentation is as good as it gets. Its help system goes on for miles and is the proper mixture of how-to and reference information.

<em>Iron Speed Designer 6.2.1</em>
Iron Speed Designer, like Alpha Five, can build both desktop and Web applications, and it excels at creating database-centric applications. Unlike Alpha Five, however, Iron Speed does not use a proprietary runtime. Peek under the hood, and you'll see that Iron Speed Designer is really a development front end for .Net and ASP.Net applications. The Designer emits either C# or VB.Net (your choice).

Iron Speed Designer's principal function is to create database access and management applications, but an application's complete source code is available. Thus, a skilled developer could extend that code to produce most any conceivable Web application. More precisely, Iron Speed builds CRUD (create, read, update, and delete) interfaces for databases. It won't create your application's "business logic" -- that is, code beyond the fundamental CRUD operations. Iron Speed's documentation claims that about 80 percent of a database-centric application's development is spent building the CRUD code.

Building an application in Iron Speed follows a series of defined steps. It's like cooking from a recipe. Of course, the first step is to create (or connect to) whatever database your application will use. Next, you select your application's display theme. This sets a standard look and feel for all the generated code. The number of available styles depends on the edition of the package you choose. Although there are plenty in the free edition, the Enterprise Edition lets you create custom styles.

Once you've chosen your application's theme, select which sorts of pages you want the designer to create. Most of the generated pages are grid-style layouts of one form or another. You can choose pages that provide view-only data access or pages that provide editing functions. Plus, there are master-detail layout styles. Overall, Iron Speed offers close to 30 different page layouts.
Extending the generated application with your own code is relatively easy. You can access the generated source at any time. For example, select a button on a generated page, and a properties window lists all of the button's methods (methods triggered by events the button recognizes). Navigate to a chosen method's entry point and fill in your code.

Because one of the first development steps is choosing the database behind the application, Iron Speed development occurs using live data. You'll see that data via the Live Preview screen.

Iron Speed provides a variety of mechanisms to build security into your applications. You can draw on the access-control features built into the back-end database (users and roles), as well as use Active Directory-based security or Windows authentication. If you enable Iron Speed's role-based security, you can control user access down to the level of individual pages or even individual controls.

Designer's built-in MSI installer makes deployment ridiculously simple. One click is all it takes to produce an *.MSI file that you can copy to the target machine and execute in the same way you would a setup.exe file. What's more, because the application is an ASP.Net application, you can alter the target database on the production system by simply changing the connection string in the Web.config file.

Perhaps Iron Speed's best feature is the fact that generated source code is always available, and is standard C# or VB.Net. Consequently, you are not bound to any proprietary language or runtime. You can modify the source to your heart's content -- which, of course, is a sword that cuts both ways.

<em>LANSA for the Web 11.5</em>
LANSA was originally built for IBM System/36 AS/400 systems, but its applications can be compiled to run on Windows or Linux systems, as well as System/38, AS/400, iSeries, and IBM i Systems. Nevertheless, it retains the ability to produce code that uses IBM 5250 terminals as the UI device. LANSA reckons this is a feature and claims that code built to run in its earliest versions can still execute in the current version. Given that the company has been around since the late 1980s, that's impressive. (There are numerous products in LANSA's portfolio. I only examined those used for developing applications.)

LANSA can be used to build applications for the desktop, the Web, and mobile devices. You use LANSA for the Web to create Web applications; it also employs the Visual LANSA development environment and component builder to build WAMs (Web Application Modules).

WAMs are files that correspond roughly to a set of related pages in a Web application. Each is composed of both RDMLX code (LANSA's server-side language) and associated XML/XSL code (that determines client-side appearance and behavior). RDMLX is a descendant of IBM CL (Command Language), the scripting language of the OS/400 operating system. Its scripting roots show: Most commands appear to have the form of an action followed by parameters. It isn't particularly complex, but anyone unused to the language will need time to pick it up.

LANSA keeps the RDMLX and XML/XSL sides separate in the IDE, which helps divide business logic from UI logic. Inside a WAM, code is grouped into Webroutines, each of which defines the behavior of a Web page in an application. It's important to point out that LANSA for the Web can also be used to build Web services -- in which case each Webroutine would correspond to a SOAP function.

When you create an application with LANSA, you're laboring inside the meta-data repository, a database that holds everything the development environment needs to know about all of the objects used to build an application. These objects include source code and back-end database meta-information about tables (referred to as files in LANSA) and attributes (fields). The meta-data repository is roughly analogous to a project file in other IDEs, though it is something more than just a project container. Because it carries information about database fields, it also holds validation information, database triggers, referential integrity information, and even help text
When you place a particular field on a form, LANSA knows (thanks to the repository) the field's data type, how many characters it includes, what security properties are attached to it, and more. In addition, when you deploy a file/table within an application, LANSA not only deploys the fields of the table (thus defining its structure) and builds any required indexes, but also deploys the database business rules that ensure data integrity.

WebLets are the visual components of LANSA Web design. A WebLet encapsulates display properties and functionality, and it can be dragged and dropped onto a Web page in the development environment. For example, WebLets include primitive components such as check boxes, radio buttons, and text areas, as well as composite components such as a grid or a calendar. LANSA's collection of WebLets are highly parameterized, allowing wide latitude in customization.

From the IDE, you can construct WAMs, their Webroutines, and WebLets. WebLets can be dragged from a palette and dropped onto the Web Designer's WYSIWYG canvas. You can also view the source behind a Web page under construction. The IDE also includes a visual debugger. You can set breakpoints on Webroutines, launch your WAM in the debugger, and single-step through the executing RDMLX code. Other panes in the debugger provide views of current field values.

LANSA requires no special server on the back end. Its runtime system is a plug-in that works on Apache on Linux and iSystem machines, and IIS on Windows systems. It's happy with all the popular RDBMS systems: DB2, Microsoft SQL Server, Oracle, Sybase, and MySQL. Architecturally, LANSA for the Web sits on top of the LANSA runtime, which provides the execution environment for LANSA applications, as well as integrity rules for databases with which LANSA applications interact, and interfaces with a Web server (Apache or IIS).

LANSA's help is extensive. The tool is awash with CHM files, which, in turn, are full of tutorials. There's also context-sensitive help in all the tools and plenty of online tutorials. RDMLX may be off-putting, but there's lots of assistance for neophytes.

  </p>
</div>