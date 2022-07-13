<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\AboutMe;
use App\Models\Certifications;
use App\Models\EmailSent;
use App\Models\WorksAndExperiences;
use Carbon\Carbon;
use App\Models\Visitors;
use App\Models\Projects;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@portfolioweb.com',
            'password' => Hash::make('doclemuel'),
        ]);
        AboutMe::create([
            'first_paragraph' => 'Dr. Lemuel Rodolfo Brana has more than 28 years of combined experience in Project and Program Management (PMBOK), Data Analytics and Management, Organization Transformation and Development, Management Information Systems, Change Management, Technology/Digital Transformation, Business Process Re-Engineering (BPR), Information & Communications Technology (ICT) and Social Protection Programs, Systems and Processes. This also includes a combination of experience in Integrated Quality Management Systems & Six Sigma, managing software development projects, maintenance projects, solutions delivery and deployment of complex information systems (including cloud-based) using industry world-standard software development and engineering methodologies (SWEBOK, and CMMi), information security, data privacy, business analytics, data sciences, software development, software testing, quality assurance and business and system analysis work.',
            'second_paragraph' => 'He is a seasoned technical project and change manager of service delivery teams of various local and foreign organizations tasked to develop , roll-out & train and maintain complex application systems. He has experience managing and operating IT environments such as SAP, Oracle, Microsoft and Linux servers, Virtualized applications (VM), web based applications accessed from users located nationwide. He has been managing project teams in the Maintenance and Support of an application or set of applications using the appropriate business measurements and terms and conditions for the project according to the project charter, project agreement or contract. This includes the Application Services aspects of Service Delivery/Service Management. He manages overall performance responsibility for managing scope, cost, schedule, and contractual deliverables which includes applying techniques for planning, tracking,change control,and risk management.',
            'third_paragraph' => 'He has experience working across and communicating with a variety of Information Systems audiences (e.g. business and technical resources) from requirements gathering through design, build, test and deployment to operations. Able to take complex, technical information and translate it both verbally and in diagrammatic form in a clear, concise, and professional manner. Able to understand business requirements and convert them into solution options and designs. He is also responsible for managing all project resources, including subcontractors, and for establishing an effective communication plan with the project team and the customer. He also provides day to day direction to the project team and regular project status to the customer.',
            'fourth_paragraph' => 'As a season strategy developer and team performance enhancer, he has extensive experience in setting and maintaining support standards and processes to optimize expectations that meet or exceed Operational and Development Service Level Agreements (SLAs). He was also invited as industry speaker namely: (1) University of Guam as Plenary Speaker in the First International Conference on Technology, Education, Assessment and Management; (2) Agile Testing Summit; (3) The 4th Industrial Revolution: Preparing the Philippines for the Jobs of the Future organized by Government-Academe-Industry Network, Inc.; (4) Youth for IT Conferences since 2009 upto present; (5) FEU Commencement Speaker; (6) NEU Commencement Speaker; and many other local and international conferences.'
        ]);
        EmailSent::create([
            'email' => "robbychristiandeleon@gmail.com"
        ]);
        Certifications::create([
            'title' => "Accredited Project Manager Certification",
            'description' => "Project Management is a set of Methodologies and Processes to develop great Products and Services that your Customers love! Project Management is the Science and Art of delivering Products and Services to customers with utmost possible Quality and Productivity, with minimal interruption in Business Processes and Services. Project Management aims to meet and exceed Customer Requirements while increasing Business Profit and minimizing Wasted Resources. Project Management achieves these challenging objectives by deploying a structured Delivery Process and a data-driven Organizational Excellence Culture."
        ]);
        Certifications::create([
            'title' => "Scrum Master Accredited Certification",
            'description' => "A Scrum Master certification, or Scrum certification, is a credential that recognizes your competency in Scrum project management principles. It can qualify candidates to become Scrum Masters—a type of project manager that uses Scrum to complete projects. A Scrum master is a facilitator who ensures that the Scrum team follows the processes that they agreed to follow. Also, the Scrum master skillfully removes obstacles and distractions that may impede the team from meeting goals and is the liaison between the Scrum team and people or teams outside the Scrum team."
        ]);
        Certifications::create([
            'title' => "International Software Testing Qualifications Board",
            'description' => "ISTQB® is the leading global certification scheme in the field of software testing.
            As of Dec 2021, ISTQB® has administered over 1.1 million exams and issued more than 806k certifications in over 130 countries. With its extensive network of Accredited Training Providers, Member Boards, and Exam Providers, ISTQB® is one of the biggest and most established vendor-neutral professional certification schemes in the world. ISTQB® terminology is industry recognized as the defacto language in the field of software testing and connects professionals worldwide."
        ]);
        Certifications::create([
            'title' => "Certified Six Sigma Black Belt (CSSBB)",
            'description' => "The Certified Six Sigma Black Belt is a professional who can explain Six Sigma philosophies and principles, including supporting systems and tools. A Black Belt should demonstrate team leadership, understand team dynamics and assign team member roles and responsibilities. Black belts have a thorough understanding of all aspects of the define, measure, analyze, improve and control (DMAIC) model in accordance with Six Sigma principles. They have basic knowledge of lean enterprise concepts, are able to identify non-value-added elements and activities and are able to use specific tools."
        ]);
        WorksAndExperiences::create([
            'title' => "Business Process Expert",
            'description' => "The consultant evaluated the current business processes of the Program and recommended improvements/enhancements during the workshop. This also included conducting/facilitating consultation meetings and other activities necessary in developing the Business Process Flow with stakeholders"
        ]);
        WorksAndExperiences::create([
            'title' => "ICT Consultant and Specialist",
            'description' => "Assisting ASEAN countries to lay the foundation for achieving Universal Health Coverage(UHC). Contributing to the development of the ASEAN social protection system by establishing a quarantine system to respond to national disasters such as COVID-19 and the risk of other infectious diseases in the future."
        ]);
        WorksAndExperiences::create([
            'title' => "ICT Consultant and Specialist",
            'description' => "Some of my responsibilities in this project includes: Developed Database Management System. Captured all type of data and information. Process data and create reports. ICT support for team of scientists, civil engineers and environmental experts."
        ]);
        WorksAndExperiences::create([
            'title' => "BPR & Training & Digital Transformation Consultant",
            'description' => "Working understanding of the concepts of Streamlining and Process Re-engineering; Re-designed logistics management process of
                the client's products and services. Identification and finalization of List of the client's Critical Services and properly classify critical G2B, G2C, and
                G2G services"
        ]);
        WorksAndExperiences::create([
            'title' => "Project Management Consultant, Change Management & IT Expert",
            'description' => "I am the Overall Project Management Consultant of the team members composed of technical consultants covering (ICT, Finance, and Taxation). I provided the assessment of risks in implementation, including legal, regulatory, operational, IT, and human resource related risks, and identify mitigating measures."
        ]);
        WorksAndExperiences::create([
            'title' => "ICT Project Management, Change Management & Process Management Consultant",
            'description' => "Some of my responsibilities in this job includes: Overall IT and Senior Technical Officer & Delivery Officer, Solutions Architect, ITIL and ISO Officer,
                ISSP and ISMS Senior Officer. Provides a wide variety of administrative functions."
        ]);
        WorksAndExperiences::create([
            'title' => "AVP-level and Senior Program & Project Manager",
            'description' => "Managing Development and Application Maintenance Systems and Support projects for large U.S. and Canadian based enterprises. As service delivery program manager, he handles a combination of I.T projects assisted by a number of project managers handling several technical personnel."
        ]);
        WorksAndExperiences::create([
            'title' => "Digital Transformation Consultant",
            'description' => "Conducts and manages various consulting work for clients here and abroad."
        ]);
        Projects::create([
            'title' => 'ICT Consultant and Specialist',
            'description' => 'Assisting ASEAN countries to lay the foundation for achieving Universal Health Coverage(UHC). Contributing to the development of the ASEAN social protection system by establishing a quarantine system to respond to national disasters such as COVID 19 and the risk of other infectious diseases in the future. Establish a foundation for sustainable cooperation through professional analysis and survey on the status of health care by ASEAN countries. Feasibility study for building e-government cloud system for ASEAN infectious diseases',
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'BPR Training & Digital Transformation Consultant',
            'description' => "Some of responsibilities in this project includes: Worked on understanding of the concepts of streamlining and process re-engineering, educate and train all members of task force on the mandatory procedures on re-engineering of systems and processes, updated citizen's charter and many more",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'Project Manager Consultant',
            'description' => "Some of my responsibilities in this project includes: Capacity development on information systems strategic management of the organizations's internal personnel and external stakeholders that can provide valuable strategic inputs to the organization, managed various groups in developing their strategic plans for the organization, initiate and develop the organzation's information system strategic plan (ISSP) and many more.",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'IT Expert, Change Management & Project Management Consultant',
            'description' => "Some of my responsibilities in this project includes: Overall Project Management Consultant of the team members, provided the assessment of risks in implementation, including legal, regulatory, operational, IT, and human resource related risk and identified mitigating measures.",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'ICT Project Management, Change Management & Process Management Consultant',
            'description' => "Some of my responsibilities in this project includes: Overall IT and Senior Technical Officer & Delivery Officer, Solutions Architect, ITIIL and ISO Officer, ISSP and ISMS Senior Officer, provided a wide variety of administrative functions.",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'Digital Transformation Consultant',
            'description' => "Conducted and managed various consulting work for clients here and abroad.",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'AVP-level and Senior Program & Project Manager',
            'description' => "Managed Development and Application Maintenance Systems and Support projects for international enterprises. Responsible in the delivery of various projects, managed local logistics and distribution projects in the pharmaceutical industry.",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'ICT Project Management Consultant & Change Management Consultant',
            'description' => "Some of my responsibilities in this project includes: Conducted a comprehensive audit using the approved audit plan on the information processing, information systems, data shring and other related or dependent processes of the organization. Participated in consultative meetings related to relevant systems of the organization.",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'Middleware SOA Architect',
            'description' => "Some of my responsibilities in this project includes: Collaborated with technical and business customers across functional areas to identify and resolve Middleware-SOA related issues. Collaborated with developers and business analyst to define application SOA based service integration scope and objectives.",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'ICT Project Management Consultant',
            'description' => "Some of my responsibilities in this project includes: Provision of inputs to the building of the corporation's enterprise architecture. Development and Execution of Roll Out Plan and Monitoring and Evaluation Plan. Performance of systems and workflow analysis and preparation documentation of the same.",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'Change Management & Digital Transformation Consultant',
            'description' => "Some of my responsibilities in this project includes: Develop the client's ISSP 2012-2014 based on their inputs (direct and indirect sources) utilizing various techniques and tools. Revision of ISSP whenever necessary or as required, until such time that the ISSP is approved. Conduct a study to assess the detailed and additional requirements of the client towards implementing IT and IT-related projects/programs for Year 2012-2014",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'Change Management & Digital Transformation Consultant',
            'description' => "Some of my responsibilities in this project includes: Develop the client's ISSP 2010 - 2012 based on their inputs (direct and indirect sources) utilizing various techniques and tools. Revision of ISSP whenever necessary or as required, until such time that the ISSP is approved. Conduct a study to assess the detailed and additional requirements of the client towards implementing IT and IT-related projects/programs for Year 2010 - 2012",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'Change Management Consultant',
            'description' => "I became the CM consultant in the development and rollout of IT training programs for state universities and colleges here in the Philippines. These courses included IT Project Management using Open Project System, Open ERP: Logistics, Accounting, and CRM, Sales & Purchasing, Managing IT Outsourcing, etc.",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'Project Management Consultant & Change Management Consultant',
            'description' => "Some of my responsibilities in the project includes: Development and Execution of Roll Out Plan and Monitoring and Evaluation Plan. Design and Implementation of Rollout Plan. Managed team that conducted systems audit and enhancement work for the client. Planned, designed, and implemented ERP solution for the client.",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'Project Digital Transformation Consultant',
            'description' => "Along with the QA and Testing Team, I was committed to achieving the project quality through effective quality planning and management of all processes starting with the stakeholders needs identification and analysis and continuing through the life cycle of acquisition, development, delivery, deployment, support and enhancement of all the client's solutions and services.",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'Assistant Vice President & Project Management Office Head',
            'description' => "Some of my responsibilities in this project includes: Led team of senior business analysts and senior technical architects for the design of transportation and logistics processes and systems. Conducted database audit, design and development of distribution and inventory system. Submission of project plan, audit plan and implementation documents.",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'ICT Project Manager',
            'description' => "Responsible for the change management, design, implementation, and integration of building systems solutions in a wide variety of industries. This highly technical and hands-on position requires the incumbent to work in a team and individual work setting contributing to all aspects of system integration including design, needs analysis, design review, testing, implementation, and validation.",
            'image_url' => 'business_project_expert.png'
        ]);
        Projects::create([
            'title' => 'Senior Systems & Business Analyst, Project Manager & Change Manager',
            'description' => "Some of my responsibilities in this project includes: Conducts Business Analysis work for clients. Creates Inception Reports for projects. Develops and Executes Roll out plan and Monitoring and Evaluation Plans. Builds, Coordinates and maintains effective relationship with
                             various levels of project stakeholders. Undertake regular monitoring and reporting on project progress, security, risks, and constraints; updates the
                             implementation plan as required.",
            'image_url' => 'business_project_expert.png'
        ]);
    }
}
