<?php

namespace Database\Seeders;

use App\Enums\CategoryType;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create(['name' => 'Accountant']);
        Category::factory()->create(['name' => 'Accounts, Finance & Financial Services']);
        Category::factory()->create(['name' => 'Administration']);
        Category::factory()->create(['name' => 'Administration Clerical']);
        Category::factory()->create(['name' => 'Advertising']);
        Category::factory()->create(['name' => 'Advertisment']);
        Category::factory()->create(['name' => 'Architects & Construction']);
        Category::factory()->create(['name' => 'Architecture']);
        Category::factory()->create(['name' => 'Bank Operation']);
        Category::factory()->create(['name' => 'Business Development']);
        Category::factory()->create(['name' => 'Business Management']);
        Category::factory()->create(['name' => 'Business Systems Analyst']);
        Category::factory()->create(['name' => 'Client Services & Customer Support']);
        Category::factory()->create(['name' => 'Computer Hardware']);
        Category::factory()->create(['name' => 'Computer Networking']);
        Category::factory()->create(['name' => 'Consultant']);
        Category::factory()->create(['name' => 'Content Writer']);
        Category::factory()->create(['name' => 'Corporate Affairs']);
        Category::factory()->create(['name' => 'Creative Design']);
        Category::factory()->create(['name' => 'Creative Writer']);
        Category::factory()->create(['name' => 'Customer Support']);
        Category::factory()->create(['name' => 'Data Entry']);
        Category::factory()->create(['name' => 'Data Entry Operator']);
        Category::factory()->create(['name' => 'Database Administration (DBA)']);
        Category::factory()->create(['name' => 'Development']);
        Category::factory()->create(['name' => 'Distribution & Logistics']);
        Category::factory()->create(['name' => 'Education & Training']);
        Category::factory()->create(['name' => 'Electronics Technician']);
        Category::factory()->create(['name' => 'Engineering']);
        Category::factory()->create(['name' => 'Engineering Construction']);
        Category::factory()->create(['name' => 'Executive Management']);
        Category::factory()->create(['name' => 'Executive Secretary']);
        Category::factory()->create(['name' => 'Field Operations']);
        Category::factory()->create(['name' => 'Front Desk Clerk']);
        Category::factory()->create(['name' => 'Front Desk Officer']);
        Category::factory()->create(['name' => 'Graphic Design']);
        Category::factory()->create(['name' => 'Hardware']);
        Category::factory()->create(['name' => 'Health & Medicine']);
        Category::factory()->create(['name' => 'Health & Safety']);
        Category::factory()->create(['name' => 'Health Care']);
        Category::factory()->create(['name' => 'Health Related']);
        Category::factory()->create(['name' => 'Hotel Management']);
        Category::factory()->create(['name' => 'Hotel/Restaurant Management']);
        Category::factory()->create(['name' => 'Human Resources']);
        Category::factory()->create(['name' => 'Import & Export']);
        Category::factory()->create(['name' => 'Industrial Production']);
        Category::factory()->create(['name' => 'Installation & Repair']);
        Category::factory()->create(['name' => 'Interior Designers & Architects']);
        Category::factory()->create(['name' => 'Internship']);
        Category::factory()->create(['name' => 'Investment Operations']);
        Category::factory()->create(['name' => 'IT Security']);
        Category::factory()->create(['name' => 'IT Systems Analyst']);
        Category::factory()->create(['name' => 'Legal & Corporate Affairs']);
        Category::factory()->create(['name' => 'Legal Affairs']);
        Category::factory()->create(['name' => 'Legal Research']);
        Category::factory()->create(['name' => 'Logistics & Warehousing']);
        Category::factory()->create(['name' => 'Maintenance/Repair']);
        Category::factory()->create(['name' => 'Management Consulting']);
        Category::factory()->create(['name' => 'Management Information System (MIS)']);
        Category::factory()->create(['name' => 'Managerial']);
        Category::factory()->create(['name' => 'Manufacturing']);
        Category::factory()->create(['name' => 'Manufacturing & Operations']);
        Category::factory()->create(['name' => 'Marketing']);
        Category::factory()->create(['name' => 'Media - Print & Electronic']);
        Category::factory()->create(['name' => 'Media & Advertising']);
        Category::factory()->create(['name' => 'Medical']);
        Category::factory()->create(['name' => 'Medicine']);
        Category::factory()->create(['name' => 'Merchandising']);
        Category::factory()->create(['name' => 'Merchandising & Product Management']);
        Category::factory()->create(['name' => 'Monitoring & Evaluation (M&E)']);
        Category::factory()->create(['name' => 'Network Administration']);
        Category::factory()->create(['name' => 'Network Operation']);
        Category::factory()->create(['name' => 'Online Advertising']);
        Category::factory()->create(['name' => 'Online Marketing']);
        Category::factory()->create(['name' => 'Operations']);
        Category::factory()->create(['name' => 'Planning']);
        Category::factory()->create(['name' => 'Planning & Development']);
        Category::factory()->create(['name' => 'Print Media']);
        Category::factory()->create(['name' => 'Printing']);
        Category::factory()->create(['name' => 'Procurement']);
        Category::factory()->create(['name' => 'Product Developer']);
        Category::factory()->create(['name' => 'Product Management']);
        Category::factory()->create(['name' => 'Project Management Consultant']);
        Category::factory()->create(['name' => 'Production & Quality Control']);
        Category::factory()->create(['name' => 'Public Relations']);
        Category::factory()->create(['name' => 'Qualitative Research']);
        Category::factory()->create(['name' => 'Quality Assurance (QA)']);
        Category::factory()->create(['name' => 'Quality Control']);
        Category::factory()->create(['name' => 'Quality Inspection']);
        Category::factory()->create(['name' => 'Recruiting']);
        Category::factory()->create(['name' => 'Recruitment']);
        Category::factory()->create(['name' => 'Repair & Overhaul']);
        Category::factory()->create(['name' => 'Research & Development (R&D)']);
        Category::factory()->create(['name' => 'Research & Evaluation']);
        Category::factory()->create(['name' => 'Research & Fellowships']);
        Category::factory()->create(['name' => 'Researcher']);
        Category::factory()->create(['name' => 'Restaurant Management']);
        Category::factory()->create(['name' => 'Retail']);
        Category::factory()->create(['name' => 'Retail & Wholesale']);
        Category::factory()->create(['name' => 'Retail Buyer']);
        Category::factory()->create(['name' => 'Retail Merchandising']);
        Category::factory()->create(['name' => 'Safety & Environment']);
        Category::factory()->create(['name' => 'Sales']);
        Category::factory()->create(['name' => 'Sales & Business Development']);
        Category::factory()->create(['name' => 'Sales Support']);
        Category::factory()->create(['name' => 'Search Engine Optimization (SEO)']);
        Category::factory()->create(['name' => 'Secretarial, Clerical & Front Office']);
        Category::factory()->create(['name' => 'Security']);
        Category::factory()->create(['name' => 'Security & Environment']);
        Category::factory()->create(['name' => 'Security Guard']);
        Category::factory()->create(['name' => 'Software & Web Development']);
        Category::factory()->create(['name' => 'Software Engineer']);
        Category::factory()->create(['name' => 'Software Testing']);
        Category::factory()->create(['name' => 'Stores & Warehousing']);
        Category::factory()->create(['name' => 'Supply Chain']);
        Category::factory()->create(['name' => 'Supply Chain Management']);
        Category::factory()->create(['name' => 'Systems Analyst']);
        Category::factory()->create(['name' => 'Teachers/Education, Training & Development']);
        Category::factory()->create(['name' => 'Technical Writer']);
        Category::factory()->create(['name' => 'Tele Sale Representative']);
        Category::factory()->create(['name' => 'Tele Sale Representative']);
        Category::factory()->create(['name' => 'Telemarketing']);
        Category::factory()->create(['name' => 'Training & Development']);
        Category::factory()->create(['name' => 'Transportation & Warehousing']);
        Category::factory()->create(['name' => 'Warehousing']);
        Category::factory()->create(['name' => 'Web Developer']);
        Category::factory()->create(['name' => 'Web Marketing']);


        Category::factory()->create(['name' => 'Information Technology', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Telecommunication/ISP', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Banking/Financial Services', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Fast Moving Consumer Goods (FMCG)', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Pharmaceuticals/Clinical Research', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Insurance / Takaful', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Advertising/PR', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Accounting/Taxation', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Textiles/Garments', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Manufacturing', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Education/Training', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Chemicals', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Agriculture/Fertilizer/Pesticide', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Hotel Management / Restaurants', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Mining/Oil & Gas/Petroleum', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Construction/Cement/Metals', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Media/Communications', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Law Firms/Legal', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Arts / Entertainment', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Broadcasting', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Manufacturing', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Business Development', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Publishing/Printing', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Travel/Tourism/Transportation', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Services', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Retail', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'N.G.O./Social Services', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Electronics', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Engineering', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Call Center', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'AutoMobile', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Fashion', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Architecture/Interior Design', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Event Management', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Gems & Jewelery', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Government', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Health & Fitness', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Healthcare/Hospital/Medical', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Hospitality', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Courier/Logistics', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Power/Energy', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Recruitment/Employment Firms', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Real Estate/Property', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Security/Law Enforcement', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Shipping/Marine', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Project Management', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Importers/ Distributors/Exporters', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Consultants', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Packaging', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Personal Care and Services', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Investments', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Apparel/Clothing', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Food & Beverages', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Tiles & Ceramics', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Warehousing', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Distribution and Logistics', 'type' => CategoryType::Industry]);
        Category::factory()->create(['name' => 'Aviation', 'type' => CategoryType::Industry]);

        Category::factory()->create(['name' => 'Full Time', 'type' => CategoryType::JobType]);
        Category::factory()->create(['name' => 'Remote', 'type' => CategoryType::JobType]);
        Category::factory()->create(['name' => 'Contract', 'type' => CategoryType::JobType]);
        Category::factory()->create(['name' => 'Freelance', 'type' => CategoryType::JobType]);
        Category::factory()->create(['name' => 'Internship', 'type' => CategoryType::JobType]);
        Category::factory()->create(['name' => 'Part Time', 'type' => CategoryType::JobType]);

        Category::factory()->create(['name' => 'Non-Matriculation', 'type' => CategoryType::JobLevel]);
        Category::factory()->create(['name' => 'Matriculation/O-Level', 'type' => CategoryType::JobLevel]);
        Category::factory()->create(['name' => 'Intermediate/A-Level', 'type' => CategoryType::JobLevel]);
        Category::factory()->create(['name' => 'Bachelor', 'type' => CategoryType::JobLevel]);
        Category::factory()->create(['name' => 'Master', 'type' => CategoryType::JobLevel]);
        Category::factory()->create(['name' => 'MPhil/MS', 'type' => CategoryType::JobLevel]);
        Category::factory()->create(['name' => 'PHD/Doctorate', 'type' => CategoryType::JobLevel]);
        Category::factory()->create(['name' => 'Certification', 'type' => CategoryType::JobLevel]);
        Category::factory()->create(['name' => 'Diploma', 'type' => CategoryType::JobLevel]);
        Category::factory()->create(['name' => 'Short Course', 'type' => CategoryType::JobLevel]);

        Category::factory()->create(['name' => 'Not required', 'type' => CategoryType::Gender]);
        Category::factory()->create(['name' => 'Female', 'type' => CategoryType::Gender]);
        Category::factory()->create(['name' => 'Male', 'type' => CategoryType::Gender]);

        Category::factory()->create(['name' => 'Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.', 'type' => CategoryType::Responsibility]);
        Category::factory()->create(['name' => 'Work with BAs, product managers and tech teams to lead the Product Design', 'type' => CategoryType::Responsibility]);
        Category::factory()->create(['name' => 'Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.', 'type' => CategoryType::Responsibility]);
        Category::factory()->create(['name' => 'Accurately estimate design tickets during planning sessions.', 'type' => CategoryType::Responsibility]);
        Category::factory()->create(['name' => 'Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.', 'type' => CategoryType::Responsibility]);
        Category::factory()->create(['name' => 'Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.', 'type' => CategoryType::Responsibility]);
        Category::factory()->create(['name' => 'Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel', 'type' => CategoryType::Responsibility]);

        Category::factory()->create(['name' => 'Data Intelligence related experience will be a plus.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'Strong excel skills and analytical thinking.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'Advanced knowledge in MS Office tools is must.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'Able to frequently visit factories and showrooms.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'Excellent analytical skills, strong decision support, and interpersonal skills.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'Strong interpersonal skills, ability to communicate and manage well at all levels of the organization.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'You have at least 3 years’ experience working as a Product Designer.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'You have experience using Sketch and InVision or Framer X.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'You have some previous experience working in an agile environment – Think two-week sprints.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'You are familiar using Jira and Confluence in your workflow.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'Computer applications.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'Networking management.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'Database management systems.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'System analysis.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'Web programming.', 'type' => CategoryType::Skill]);
        Category::factory()->create(['name' => 'Web development and design.', 'type' => CategoryType::Skill]);

        Category::factory()->create(['name' => 'International working environment with communication in English and German language.', 'type' => CategoryType::Benefit]);
        Category::factory()->create(['name' => 'Interesting career opportunities and extensive range of qualification and further training programs.', 'type' => CategoryType::Benefit]);
        Category::factory()->create(['name' => 'Compatibility of family and career certified by work and family audit.', 'type' => CategoryType::Benefit]);
    }
}
