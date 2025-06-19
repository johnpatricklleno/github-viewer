import { BrowserRouter as Router, Routes, Route, Navigate } from 'react-router-dom';
import IssuesList from './IssuesList';
import IssueDetail from './IssueDetail';
import '../../css/app.css';
const App = () => {
  return (
    <Router>
      <main className="min-h-screen bg-gray-100 p-6">
        <div className="max-w-3xl mx-auto">
          <h1 className="text-3xl font-bold text-center mb-6 text-black">GitHub Issues Viewer</h1>
          <Routes>
            <Route path="/" element={<Navigate to="/issues" replace />} />
            <Route path="/issues" element={<IssuesList />} />
            <Route path="/issues/:owner/:repo/:number" element={<IssueDetail />} />
          </Routes>
        </div>
      </main>
    </Router>
  );
};

export default App;
